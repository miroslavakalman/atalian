<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactSubmission;
use App\Mail\ContactForm;

class ContactController extends Controller
{
   public function submit(Request $request)
{
    // Получаем локаль из сессии или используем по умолчанию
    $locale = session('locale', app()->getLocale());
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
        'subject' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:50',
        'company' => 'nullable|string|max:255',
        'message' => 'required|string|max:2000',
        'consent_pd' => 'required|accepted',
    ]);

    // Сохраняем в базу данных
    $submission = ContactSubmission::create([
        'subject' => $data['subject'],
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'] ?? null,
        'company' => $data['company'] ?? null,
        'message' => $data['message'],
        'consent_pd' => true,
        'status' => ContactSubmission::STATUS_NEW,
    ]);

 
    return back()->with('success', __('messages.contact_success'));
}
}