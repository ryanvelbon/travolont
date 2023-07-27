<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TravelerController extends Controller
{
    public function show($username)
    {
        $member = User::where('username', $username)->firstOrFail();

        if($member->account_type !== 'traveler') {
            abort(404);
        }

        return view('travelersShow', [
            'member' => $member
        ]);
    }
}
