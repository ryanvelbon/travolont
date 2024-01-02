<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\HostType;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $categories = HostType::all();

        $featCountries = Country::whereNotNull('order')
            ->withCount('hosts')
            ->withCount('travelers')
            ->orderBy('order')
            ->get();

        return view('welcome', [
            'categories' => $categories,
            'featCountries' => $featCountries
        ]);
    }
}
