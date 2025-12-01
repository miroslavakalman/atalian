<?php

namespace App\Http\Controllers;

use App\Services\HHService;
use App\Models\CareerSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    // Метод для отображения страницы
    public function index($locale)
    {
        app()->setLocale($locale);

        $hh = new HHService();
        $vacancies = $hh->getVacancies();

        return view('career', compact('vacancies'));
    }

    // Метод для обработки формы
    public function submit(Request $request, $locale)
    {
        app()->setLocale($locale);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Загрузка резюме
        $path = $request->file('resume')->store('resumes');

        $submission = CareerSubmission::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'resume_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Спасибо! Ваше резюме получено.');
    }
}
