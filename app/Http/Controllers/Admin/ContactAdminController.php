<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    public function index(Request $request)
    {
        // Проверка аутентификации
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        $query = ContactSubmission::latest();

        // Поиск
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // Фильтр по статусу
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Фильтр по теме
        if ($request->filled('subject')) {
            $query->where('subject', $request->subject);
        }

        // Фильтр по дате
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $submissions = $query->paginate(20);
        $statuses = ContactSubmission::getStatuses();
        
        $subjects = [
            'general' => 'Общий вопрос',
            'services' => 'Информация об услугах',
            'partnership' => 'Партнерство',
            'career' => 'Карьера',
            'other' => 'Другое',
        ];

        return view('admin.contact.index', compact('submissions', 'statuses', 'subjects'));
    }

    public function show(ContactSubmission $submission)
    {
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        if ($submission->status === ContactSubmission::STATUS_NEW) {
            $submission->update(['status' => ContactSubmission::STATUS_READ]);
        }

        return view('admin.contact.show', compact('submission'));
    }

    public function updateStatus(Request $request, ContactSubmission $submission)
    {
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        $request->validate([
            'status' => 'required|in:' . implode(',', array_keys(ContactSubmission::getStatuses())),
            'notes' => 'nullable|string|max:2000',
        ]);

        $submission->update([
            'status' => $request->status,
            'notes' => $request->notes ?? $submission->notes,
        ]);

        return back()->with('success', 'Статус обновлен');
    }

    public function destroy(ContactSubmission $submission)
    {
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        $submission->delete();

        return redirect()->route('admin.contact.index')
            ->with('success', 'Обращение удалено');
    }

    public function bulkAction(Request $request)
    {
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        $request->validate([
            'action' => 'required|in:delete,change_status',
            'ids' => 'required|array',
            'ids.*' => 'exists:contact_submissions,id',
        ]);

        if ($request->action === 'delete') {
            ContactSubmission::whereIn('id', $request->ids)->delete();
            return back()->with('success', 'Выбранные обращения удалены');
        }

        if ($request->action === 'change_status' && $request->filled('new_status')) {
            ContactSubmission::whereIn('id', $request->ids)
                ->update(['status' => $request->new_status]);
            return back()->with('success', 'Статусы обновлены');
        }

        return back()->with('error', 'Действие не выполнено');
    }

    public function export(Request $request)
    {
        if (!auth()->check()) {
            abort(403, 'Требуется авторизация');
        }

        $submissions = ContactSubmission::when($request->filled('status'), function($q) use ($request) {
            return $q->where('status', $request->status);
        })->latest()->get();

        $csvData = "Дата;Тема;Имя;Email;Телефон;Компания;Статус;Согласие на ПДн\n";

        foreach ($submissions as $submission) {
            $csvData .= sprintf(
                "%s;%s;%s;%s;%s;%s;%s;%s\n",
                $submission->created_at->format('d.m.Y H:i'),
                $submission->subject_label,
                $submission->name,
                $submission->email,
                $submission->phone ?? '-',
                $submission->company ?? '-',
                $submission->status_label,
                $submission->consent_pd ? 'Да' : 'Нет'
            );
        }

        $filename = 'contact_submissions_' . date('Y-m-d_H-i') . '.csv';

        return response($csvData)
            ->header('Content-Type', 'text/csv; charset=utf-8')
            ->header('Content-Disposition', "attachment; filename=\"{$filename}\"");
    }
}