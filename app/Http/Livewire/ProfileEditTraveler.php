<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Traveler;

class ProfileEditTraveler extends Component
{
    public $traveler;

    public $step = 1;

    protected $rules = [
        'traveler.current_city_id' => 'required|exists:cities,id',
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

    #[On('city-selected')]
    public function updateCurrentCity($id)
    {
        $this->traveler->current_city_id = $id;
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
        $this->validateOnly('traveler.current_city_id');
        $this->traveler->save();
        $this->step = 3;
    }

}
