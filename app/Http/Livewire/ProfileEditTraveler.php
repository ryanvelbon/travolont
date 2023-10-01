<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Traveler;

class ProfileEditTraveler extends Component
{
    public $traveler;

    public $step = 1;

    protected $rules = [
    ];

    public function mount()
    {
        $this->traveler = auth()->user()->travelerProfile;
    }

    public function render()
    {
        return view('livewire.profile.traveler.edit', [
            // 
        ])->extends('layouts.auth', ['showNavbar' => true]);
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function step1()
    {
        // $this->validateOnly('traveler.foo');
        $this->traveler->save();
        $this->step = 2;
    }

    public function step2()
    {
        // $this->validateOnly('traveler.goo');
        $this->traveler->save();
        $this->step = 3;
    }

}
