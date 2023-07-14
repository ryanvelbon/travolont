<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $featCities = City::whereNotNull('order')
                        ->orderBy('order')
                        ->get();

        return view('welcome', [
            'featCities' => $featCities
        ]);
    }
}
