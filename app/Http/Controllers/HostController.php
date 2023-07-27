<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HostController extends Controller
{
    public function show($username)
    {
        $member = User::where('username', $username)->firstOrFail();

        if($member->account_type !== 'host') {
            abort(404);
        }

        return view('hostsShow', [
            'member' => $member
        ]);
    }
}
