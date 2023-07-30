<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $featCountries = Country::whereNotNull('order')
                        ->orderBy('order')
                        ->get();

        return view('welcome', [
            'featCountries' => $featCountries
        ]);
    }
}
