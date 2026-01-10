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
    $locale = session('locale', app()->getLocale());
    app()->setLocale($locale);

    /* ======================
       1. ХАНИПОТ
    ====================== */
    if ($request->filled('website')) {
        abort(403);
    }

    /* ======================
       2. ТАЙМИНГ (anti-bot)
    ====================== */
    if ($request->has('form_time')) {
        if (time() - (int)$request->form_time < 3) {
            abort(403);
        }
    }

    /* ======================
       3. БАЗОВАЯ ВАЛИДАЦИЯ
    ====================== */
    if (!$request->has('consent_pd')) {
        return back()->withErrors([
            'consent_pd' => 'Необходимо согласие на обработку ПДн'
        ]);
    }

    $data = $request->validate([
        'subject'     => 'required|string|max:255',
        'name'        => 'required|string|max:255',
        'email'       => 'required|email|max:255',
        'phone'       => 'nullable|string|max:50',
        'company'     => 'nullable|string|max:255',
        'message'     => 'required|string|max:2000',
        'consent_pd'  => 'required|accepted',
    ]);

    $message = $data['message'];

    /* ======================
       4. ССЫЛКИ / HTML / NSFW
    ====================== */
    $spamPatterns = [
        '/https?:\/\//i',
        '/www\./i',
        '/<a\s/i',
        '/href=/i',
        '/<script/i',
        '/\[url]/i',
    ];

    foreach ($spamPatterns as $pattern) {
        if (preg_match($pattern, $message)) {
            abort(403);
        }
    }

    /* ======================
       5. ЯЗЫК (RU / EN only)
    ====================== */
    if (!preg_match('/[а-яА-Яa-zA-Z]/u', $message)) {
        abort(403);
    }

    /* ======================
       6. КОРОТКИЙ "PRICE SPAM"
    ====================== */
    if (
        preg_match('/price|pricing|quote|cost/i', $message)
        && mb_strlen($message) < 60
    ) {
        abort(403);
    }

   
        function looksLikeGibberish(string $text): bool
{
    // слишком много заглавных
    $upperRatio = preg_match_all('/[A-Z]/', $text) / max(1, strlen($text));
    if ($upperRatio > 0.5) {
        return true;
    }

    // длинные "слова" без гласных
    if (preg_match('/\b[^aeiouyаеиоуыэюя]{8,}\b/ui', $text)) {
        return true;
    }

    // нет пробелов при длинном тексте
    if (strlen($text) > 20 && substr_count($text, ' ') < 1) {
        return true;
    }

    return false;
}
    if (looksLikeGibberish($message)) {
        abort(403);
    }

    if (str_word_count($message) < 3) {
        abort(403);
    }

    if (
        preg_match('/\.(\w\.){3,}/', $data['email']) 
    ) {
        abort(403);
    }

 /* ======================
       7. СОХРАНЕНИЕ
    ====================== */
    ContactSubmission::create([
        'subject'    => $data['subject'],
        'name'       => $data['name'],
        'email'      => $data['email'],
        'phone'      => $data['phone'] ?? null,
        'company'    => $data['company'] ?? null,
        'message'    => $data['message'],
        'consent_pd' => true,
        'status'     => ContactSubmission::STATUS_NEW,
    ]);
    return back()->with('success', __('messages.contact_success'));
}

}