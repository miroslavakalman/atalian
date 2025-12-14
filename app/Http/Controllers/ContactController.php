<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request, $locale)
    {
        app()->setLocale($locale);

        // Honeypot
        if ($request->filled('website')) {
            abort(400, 'Bot detected');
        }

        // Валидация
        $data = $request->validate([
            'subject' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Rate-limit через middleware 'throttle:5,1' на маршруте
        // Отправка письма
        Mail::to('info@atalian.ru')->send(new \App\Mail\ContactForm($data));

        return back()->with('success', __('messages.contact_success'));
    }
}
