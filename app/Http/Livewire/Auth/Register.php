<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\Host;
use App\Models\User;
use App\Models\Traveler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component
{
    /** @var string */
    public $username = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    /** @var string */
    public $accountType = '';

    public function register()
    {
        $this->validate([
            'username' => ['required', 'alpha_num:ascii', 'min:5', 'max:50', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
            'accountType' => 'required|in:traveler,host',
        ]);

        $user = User::create([
            'email' => $this->email,
            'username' => strtolower($this->username),
            'password' => Hash::make($this->password),
            'account_type' => $this->accountType,
        ]);

        // create an empty profile
        if ($user->account_type === 'host') {
            Host::create(['user_id' => $user->id]);
        } elseif ($user->account_type === 'traveler') {
            Traveler::create(['user_id' => $user->id]);
        }

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->route('profile.edit');
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
