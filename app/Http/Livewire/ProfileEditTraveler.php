<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileEditTraveler extends Component
{
    public function render()
    {
        return view('livewire.profile-edit-traveler')->extends('layouts.auth');
    }
}
