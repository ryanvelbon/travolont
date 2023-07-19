<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TravelerController extends Controller
{
    public function index()
    {
        return view('travelersIndex');
    }

    public function show($username)
    {
        $member = User::where('username', $username)->firstOrFail();

        return view('travelersShow', [
            'member' => $member
        ]);
    }
}
