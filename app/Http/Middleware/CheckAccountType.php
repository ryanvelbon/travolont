<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAccountType
{
    public function handle(Request $request, Closure $next, $accountType): Response
    {
        if (!Auth::check() || Auth::user()->account_type !== $accountType) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
