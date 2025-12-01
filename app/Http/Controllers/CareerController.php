<?php

namespace App\Http\Controllers;

use App\Services\HHService;

class CareerController extends Controller
{
    public function index($locale   )
    {
         app()->setLocale($locale);
        $hh = new HHService();
        $vacancies = $hh->getVacancies();

        return view('career', compact('vacancies'));
    }
}

