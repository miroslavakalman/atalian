<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;

Route::get('/', function () {
    return redirect(app()->getLocale() . '/');
});

// Группа маршрутов с префиксом языка
Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|ru']], function() {

    Route::get('/', function($locale){
        app()->setLocale($locale);
        return view('welcome'); // главная страница
    });

    Route::get('/about', function($locale){
        app()->setLocale($locale);
        return view('about');
    });

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

    Route::get('/ethics', function($locale){
        app()->setLocale($locale);
        return view('ethics');
    });

    // Career
    Route::get('/career', [CareerController::class, 'index'])->name('career');
    Route::post('/career/submit', [CareerController::class, 'submit'])->name('career.submit');
    Route::get('/career/thanks', function () {
        return view('career.thanks');
    })->name('career.thanks');

});
