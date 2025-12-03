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

    Route::get('/services', function($locale){
        app()->setLocale($locale);
        return view('services');
    });

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
    Route::get('/career', [CareerController::class, 'index'])->name('career');
    Route::post('/career/submit', [CareerController::class, 'submit'])->name('career.submit');
    Route::get('/career/thanks', function () {
        return view('career.thanks');
    })->name('career.thanks');

});
