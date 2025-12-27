<?php

namespace App\Http\Controllers;

use App\Services\HHService;
use App\Models\CareerSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function index($locale)
    {
        app()->setLocale($locale);

        $hh = new HHService();
        $vacancies = $hh->getVacancies();

        return view('career', compact('vacancies'));
    }

    public function submit(Request $request, $locale)
    {
        app()->setLocale($locale);

        // Бот-ловушка
        if ($request->filled('website')) {
            abort(400, 'Bot detected');
        }

        // Проверка согласия на ПДн
        if (!$request->has('consent_pd')) {
            return back()->withErrors(['consent_pd' => 'Необходимо согласие на обработку ПДн']);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'resume' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
            'message' => 'nullable|string|max:1000',
            'vacancy_name' => 'nullable|string|max:255',
        ]);

        // Загрузка резюме
        $path = $request->file('resume')->store('resumes', 'public');

        // Создание записи
        $submission = CareerSubmission::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'resume_path' => $path,
            'message' => $data['message'] ?? null,
            'vacancy_name' => $data['vacancy_name'] ?? null,
            'consent_pd' => $request->has('consent_pd'),
            'consent_marketing' => $request->has('consent_marketing'),
            'status' => CareerSubmission::STATUS_NEW,
        ]);

        // Отправка уведомления на email (если нужно)
        // Mail::to(config('mail.admin_email'))->send(new NewCareerSubmission($submission));

        return redirect()->route('career.thanks', ['locale' => $locale])
            ->with('success', 'Ваша заявка успешно отправлена!');
    }

    // Новая страница благодарности
    public function thanks($locale)
    {
        app()->setLocale($locale);
        return view('career.thanks');
    }
}