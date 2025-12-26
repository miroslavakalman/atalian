<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request, $locale)
    {
        app()->setLocale($locale);

        if ($request->filled('website')) {
            abort(400, 'Bot detected');
        }

        $data = $request->validate([
            'subject' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Mail::to('info@atalian.ru')->send(new \App\Mail\ContactForm($data));

        return back()->with('success', __('messages.contact_success'));
    }
}
