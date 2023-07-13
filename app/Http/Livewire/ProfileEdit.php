<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;

class ProfileEdit extends Component
{
    public $countries;

    public $firstName;
    public $lastName;
    public $nationality;

    protected $rules = [
        'firstName' => 'required|min:2',
        'lastName' => 'required|min:2',
        'nationality' => 'required|exists:countries,id',
    ];

    public function mount()
    {
        $this->countries = Country::all();

        $user = auth()->user();

        $this->firstName = $user->first_name ?? '';
        $this->lastName = $user->last_name ?? '';
        $this->nationality = $user->nationality ?? null;
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
        $user->nationality = $this->nationality;

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
