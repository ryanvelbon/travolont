<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Traveler;

class ProfileEditTraveler extends Component
{
    public $currentStep = 1;

    // Form Fields
    public $foo;
    public $goo;
    public $zoo;

    public function render()
    {
        return view('livewire.profile.traveler.edit')->extends('layouts.auth', ['showNavbar' => true]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->stepValidationRules());
    }

    public function nextStep()
    {
        $this->validate($this->stepValidationRules());
        $this->currentStep++;
    }

    public function submitForm()
    {
        if ($this->currentStep === 3) {
            $this->save();
        } else {
            $this->nextStep();
        }
    }

    public function save()
    {
        $this->validate($this->stepValidationRules());

        // Add your save logic here, for example
        Traveler::create([
            'foo' => $this->foo,
            'goo' => $this->goo,
            'zoo' => $this->zoo,
        ]);

        // Reset fields and step for next use
        $this->reset('foo', 'goo', 'zoo', 'currentStep');

        session()->flash('message', 'Profile successfully updated.');
    }

    protected function stepValidationRules()
    {
        $rules = [
            1 => ['foo' => 'required|string|max:255'],
            2 => ['goo' => 'required|string|max:255'],
            3 => ['zoo' => 'required|string|max:255'],
        ];

        return $rules[$this->currentStep];
    }
}
