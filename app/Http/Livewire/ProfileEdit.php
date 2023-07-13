<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileEdit extends Component
{
    public $firstName;
    public $lastName;

    protected $rules = [
        'firstName' => 'required|min:2',
        'lastName' => 'required|min:2',
    ];

    public function mount()
    {
        $user = auth()->user();

        $this->firstName = $user->first_name ?? '';
        $this->lastName = $user->last_name ?? '';
    }

    public function render()
    {
        return view('livewire.profile-edit');
    }

    public function save()
    {
        $this->validate();

        $user = auth()->user();

        $user->first_name = $this->firstName;
        $user->last_name = $this->lastName;

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
