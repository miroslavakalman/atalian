<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\Admin\CareerAdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactAdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::prefix('{locale}')->group(function () {
    Route::get('career', [CareerController::class, 'index'])->name('career');
    Route::post('career/submit', [CareerController::class, 'submit'])->name('career.submit');
    Route::get('career/thanks', [CareerController::class, 'thanks'])->name('career.thanks');
});

// Админ-роуты с middleware в роутах
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [CareerAdminController::class, 'dashboard'])->name('dashboard');
    
    Route::prefix('career')->name('career.')->group(function () {
        Route::get('/', [CareerAdminController::class, 'index'])->name('index');
        Route::get('/export', [CareerAdminController::class, 'export'])->name('export');
        Route::post('/bulk', [CareerAdminController::class, 'bulkAction'])->name('bulk');
        Route::get('/{submission}', [CareerAdminController::class, 'show'])->name('show');
        Route::put('/{submission}/status', [CareerAdminController::class, 'updateStatus'])->name('update-status');
        Route::get('/{submission}/download', [CareerAdminController::class, 'downloadResume'])->name('download');
        Route::delete('/{submission}', [CareerAdminController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactAdminController::class, 'index'])->name('index');
    Route::get('/export', [ContactAdminController::class, 'export'])->name('export');
    Route::post('/bulk', [ContactAdminController::class, 'bulkAction'])->name('bulk');
    Route::get('/{submission}', [ContactAdminController::class, 'show'])->name('show');
    Route::put('/{submission}/status', [ContactAdminController::class, 'updateStatus'])->name('update-status');
    Route::delete('/{submission}', [ContactAdminController::class, 'destroy'])->name('destroy');
});
});

// Аутентификация
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('admin.dashboard');
    }
    return view('admin.auth.login');
})->name('login');

Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    
    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
    }
    
    return back()->withErrors([
        'email' => 'Неверные учетные данные.',
    ])->onlyInput('email');
});

Route::post('/logout', function (Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');


Route::get('/', function () {
    return redirect(app()->getLocale() . '/');
});
Route::post('/contact/submit', [ContactController::class, 'submit'])
    ->middleware('throttle:5,1')
    ->name('contact.submit');

// Группа маршрутов с префиксом языка
Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|ru']], function() {

    Route::get('/', function($locale){
        app()->setLocale($locale);
        return view('welcome'); 
    });

    Route::get('/about', function($locale){
        app()->setLocale($locale);
        return view('about');
    })->name('about');

    Route::get('/ethics', function($locale){
        app()->setLocale($locale);
        return view('ethics');
    })->name('ethics');

    Route::get('/cookies', function($locale){
        app()->setLocale($locale);
        return view('cookies');
    })->name('cookies');

    // ------------------- Услуги -------------------
    Route::get('/services', function($locale){
        app()->setLocale($locale);
        return view('services.index'); 
    })->name('services.index');

    Route::get('/services/logistics', function($locale){
        app()->setLocale($locale);
        return view('services.logistics');
    })->name('services.logistics');

    Route::get('/services/cleaning', function($locale){
        app()->setLocale($locale);
        return view('services.cleaning');
    })->name('services.cleaning');

    Route::get('/services/technical', function($locale){
        app()->setLocale($locale);
        return view('services.technical');
    })->name('services.technical');

    Route::get('/services/administrative', function($locale){
        app()->setLocale($locale);
        return view('services.administrative');
    })->name('services.administrative');

    Route::get('/services/custom', function($locale){
        app()->setLocale($locale);
        return view('services.custom');
    })->name('services.custom');

    Route::get('/services/facility', function($locale){
        app()->setLocale($locale);
        return view('services.facility');
    })->name('services.facility');

    // ------------------- Остальные страницы -------------------
    Route::get('/contact', function($locale){
        app()->setLocale($locale);
        return view('contact');
    });

    Route::get('/industries', function($locale){
        app()->setLocale($locale);
        return view('industries');
    });

    Route::get('/sustainability', function($locale){
        app()->setLocale($locale);
        return view('sustainability');
    });
    Route::get('/policy', function ($locale) {
        app()->setLocale($locale);
        return view('policy');
    })->name('policy');
    
     Route::get('/cookies', function ($locale) {
        app()->setLocale($locale);
        return view('cookies');
    })->name('cookies');
    
    Route::get('/sitemap', function ($locale) {
        app()->setLocale($locale);
        return view('sitemap');
    })->name('sitemap');
    
    Route::get('/career', [CareerController::class, 'index'])->name('career');
    Route::post('/career/submit', [CareerController::class, 'submit'])->name('career.submit');
    Route::get('/career/thanks', function () {
        return view('career.thanks');
    })->name('career.thanks');

});


Route::post('/career/submit', [CareerController::class, 'submit'])->name('career.submit');
Route::get('/sitemap.xml', function () {

    $locales = ['ru', 'en'];

    $pages = [
        '',     
        'about',
        'contact',
        'industries',
        'services',
        'services/logistics',
        'services/cleaning',
        'services/technical',
        'services/administrative',
        'services/custom',
        'career',
        'sustainability',
        'ethics',
    ];

    $content = view('seo.sitemap', compact('locales', 'pages'));

    return response($content, 200)
        ->header('Content-Type', 'application/xml');
});
// Публичные маршруты
Route::prefix('{locale}')->group(function () {
    Route::get('career', [CareerController::class, 'index'])->name('career');
    Route::post('career/submit', [CareerController::class, 'submit'])->name('career.submit');
    Route::get('career/thanks', [CareerController::class, 'thanks'])->name('career.thanks');
});

// Админ-маршруты (требуют аутентификации)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::prefix('career')->name('admin.career.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\CareerAdminController::class, 'index'])->name('index');
        Route::get('/export', [\App\Http\Controllers\Admin\CareerAdminController::class, 'export'])->name('export');
        Route::post('/bulk', [\App\Http\Controllers\Admin\CareerAdminController::class, 'bulkAction'])->name('bulk');
        Route::get('/{submission}', [\App\Http\Controllers\Admin\CareerAdminController::class, 'show'])->name('show');
        Route::put('/{submission}/status', [\App\Http\Controllers\Admin\CareerAdminController::class, 'updateStatus'])->name('update-status');
        Route::get('/{submission}/download', [\App\Http\Controllers\Admin\CareerAdminController::class, 'downloadResume'])->name('download');
        Route::delete('/{submission}', [\App\Http\Controllers\Admin\CareerAdminController::class, 'destroy'])->name('destroy');
    });
});