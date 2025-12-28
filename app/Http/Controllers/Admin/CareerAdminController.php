<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerSubmission;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CareerAdminController extends Controller
{
    public function __construct()
    {
     
    }

     public function index(Request $request)
    {
        
        $query = CareerSubmission::latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('vacancy_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $submissions = $query->paginate(20);
        $statuses = CareerSubmission::getStatuses();

        return view('admin.career.index', compact('submissions', 'statuses'));
    }

    public function show(CareerSubmission $submission)
    {
        return view('admin.career.show', compact('submission'));
    }

    public function updateStatus(Request $request, CareerSubmission $submission)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', array_keys(CareerSubmission::getStatuses())),
            'notes' => 'nullable|string|max:2000',
        ]);

        $submission->update([
            'status' => $request->status,
            'notes' => $request->notes ?? $submission->notes,
        ]);

        return back()->with('success', 'Статус обновлен');
    }

    public function downloadResume(CareerSubmission $submission)
    {
        if (!$submission->resume_path) {
            return back()->with('error', 'Файл резюме не найден в базе данных');
        }
        
        try {
            if (!Storage::disk('public')->exists($submission->resume_path)) {
                $alternativePath = str_replace('resumes/', '', $submission->resume_path);
                
                if (Storage::disk('public')->exists($alternativePath)) {
                    $filePath = Storage::disk('public')->path($alternativePath);
                    $fileName = 'resume_' . $this->sanitizeFileName($submission->name) . '_' . date('Y-m-d') . '.' . pathinfo($alternativePath, PATHINFO_EXTENSION);
                    
                    return response()->download($filePath, $fileName);
                }
                
                return back()->with('error', 'Файл резюме не найден на сервере. Путь: ' . $submission->resume_path);
            }
            
            $filePath = Storage::disk('public')->path($submission->resume_path);
            $fileName = 'resume_' . $this->sanitizeFileName($submission->name) . '_' . date('Y-m-d') . '.' . pathinfo($submission->resume_path, PATHINFO_EXTENSION);
            
            return response()->download($filePath, $fileName);
            
        } catch (\Exception $e) {
            return back()->with('error', 'Ошибка при загрузке файла: ' . $e->getMessage());
        }
    }

    protected function sanitizeFileName($name)
    {
        $name = preg_replace('/[^\w\s-]/', '', $name);
        $name = preg_replace('/\s+/', '_', $name);
        return mb_strtolower($name, 'UTF-8');
    }

    public function destroy(CareerSubmission $submission)
    {
        if ($submission->resume_path) {
            Storage::disk('public')->delete($submission->resume_path);
        }

        $submission->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Заявка удалена');
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,change_status',
            'ids' => 'required|array',
            'ids.*' => 'exists:career_submissions,id',
        ]);

        if ($request->action === 'delete') {
            CareerSubmission::whereIn('id', $request->ids)->delete();
            return back()->with('success', 'Выбранные заявки удалены');
        }

        if ($request->action === 'change_status' && $request->filled('new_status')) {
            CareerSubmission::whereIn('id', $request->ids)
                ->update(['status' => $request->new_status]);
            return back()->with('success', 'Статусы обновлены');
        }

        return back()->with('error', 'Действие не выполнено');
    }

    public function export(Request $request)
    {
        $submissions = CareerSubmission::when($request->filled('status'), function($q) use ($request) {
            return $q->where('status', $request->status);
        })->latest()->get();

        $csvData = "Имя;Email;Телефон;Вакансия;Статус;Дата;Согласие на ПДн;Согласие на рассылку\n";

        foreach ($submissions as $submission) {
            $csvData .= sprintf(
                "%s;%s;%s;%s;%s;%s;%s;%s\n",
                $submission->name,
                $submission->email,
                $submission->phone ?? '-',
                $submission->vacancy_name ?? '-',
                $submission->status_label,
                $submission->created_at->format('d.m.Y H:i'),
                $submission->consent_pd ? 'Да' : 'Нет',
                $submission->consent_marketing ? 'Да' : 'Нет'
            );
        }

        $filename = 'career_submissions_' . date('Y-m-d_H-i') . '.csv';

        return response($csvData)
            ->header('Content-Type', 'text/csv; charset=utf-8')
            ->header('Content-Disposition', "attachment; filename=\"{$filename}\"");
    }
     public function dashboard()
    {
        $stats = [
            'total' => CareerSubmission::count(),
            'new' => CareerSubmission::where('status', 'new')->count(),
            'reviewed' => CareerSubmission::where('status', 'reviewed')->count(),
            'invited' => CareerSubmission::where('status', 'invited')->count(),
            'rejected' => CareerSubmission::where('status', 'rejected')->count(),
            'last_week' => CareerSubmission::where('created_at', '>=', now()->subWeek())->count(),
        ];
        
        $recentSubmissions = CareerSubmission::latest()->take(10)->get();
        
        return view('admin.dashboard', compact('stats', 'recentSubmissions'));
    }
}