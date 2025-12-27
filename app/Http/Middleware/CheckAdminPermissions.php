// routes/web.php
<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\Admin\CareerAdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Публичные маршруты
Route::prefix('{locale}')->group(function () {
    Route::get('career', [CareerController::class, 'index'])->name('career');
    Route::post('career/submit', [CareerController::class, 'submit'])->name('career.submit');
    Route::get('career/thanks', [CareerController::class, 'thanks'])->name('career.thanks');
});

// Админ-маршруты
Route::middleware(['auth', 'check.permission'])->prefix('admin')->name('admin.')->group(function () {
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