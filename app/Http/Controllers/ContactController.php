<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ContactSubmission;

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
            return $this->reject($request, 'honeypot');
        }

        /* ======================
           2. ТАЙМИНГ (мягкий)
        ====================== */
        if ($request->has('form_time')) {
            if (time() - (int) $request->form_time < 1) {
                return $this->reject($request, 'too_fast');
            }
        }

        /* ======================
           3. ВАЛИДАЦИЯ
        ====================== */
        $data = $request->validate([
            'subject'     => 'required|string|max:255',
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'nullable|string|max:50',
            'company'     => 'nullable|string|max:255',
            'message'     => 'required|string|max:2000',
            'consent_pd'  => 'required|accepted',
        ]);

        $message = trim($data['message']);

        /* ======================
           4. СЛИШКОМ КОРОТКО
        ====================== */
        if (mb_strlen($message) < 15) {
            return $this->reject($request, 'too_short');
        }

        /* ======================
           5. ССЫЛКИ (разрешаем 1)
        ====================== */
        if (preg_match_all('/https?:\/\/|www\./i', $message) > 1) {
            return $this->reject($request, 'too_many_links');
        }

        /* ======================
           6. МУСОР / ГИББЕРИШ
        ====================== */
        if ($this->looksLikeGibberish($message)) {
            return $this->reject($request, 'gibberish');
        }

        /* ======================
           7. PRICE-SPAM (узкий)
        ====================== */
        if (
            preg_match('/price|pricing|quote|cost/i', $message) &&
            mb_strlen($message) < 60
        ) {
            return $this->reject($request, 'price_spam');
        }

        /* ======================
           8. EMAIL СПАМ-ФОРМАТ
        ====================== */
        if (preg_match('/\.(\w\.){3,}/', $data['email'])) {
            return $this->reject($request, 'email_pattern');
        }

        /* ======================
           9. СОХРАНЕНИЕ
        ====================== */
        ContactSubmission::create([
            'subject'    => $data['subject'],
            'name'       => $data['name'],
            'email'      => $data['email'],
            'phone'      => $data['phone'] ?? null,
            'company'    => $data['company'] ?? null,
            'message'    => $message,
            'consent_pd' => true,
            'status'     => ContactSubmission::STATUS_NEW,
        ]);

        return back()->with('success', __('messages.contact_success'));
    }

    /* ======================
       АНТИСПАМ: гиббериш
    ====================== */
    private function looksLikeGibberish(string $text): bool
    {
        // слишком много заглавных
        $upperRatio =
            preg_match_all('/[A-ZА-Я]/u', $text) /
            max(1, mb_strlen($text));

        if ($upperRatio > 0.6) {
            return true;
        }

        // длинные слова без гласных
        if (preg_match('/\b[^aeiouyаеиоуыэюя]{8,}\b/ui', $text)) {
            return true;
        }

        // длинный текст без пробелов
        if (mb_strlen($text) > 25 && substr_count($text, ' ') < 1) {
            return true;
        }

        return false;
    }

    /* ======================
       ОТКАЗ (без 403)
    ====================== */
    private function reject(Request $request, string $reason)
    {
        Log::info('Contact form blocked', [
            'reason' => $reason,
            'ip'     => $request->ip(),
            'email'  => $request->input('email'),
        ]);

        return back()
            ->withInput()
            ->withErrors([
                'message' => __('messages.contact_failed'),
            ]);
    }
}
