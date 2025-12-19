<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;

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
