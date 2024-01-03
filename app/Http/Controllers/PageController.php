<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\HostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function home()
    {
        $categories = Cache::rememberForever('host_types', function () {
            return HostType::all();
        });

        $featCountries = Cache::remember('feat_countries', 60*60*24, function () {
            return Country::whereNotNull('order')
                ->withCount('hosts')
                ->withCount('travelers')
                ->orderBy('hosts_count', 'desc')
                ->get();
        });

        return view('welcome', [
            'categories' => $categories,
            'featCountries' => $featCountries
        ]);
    }
}
