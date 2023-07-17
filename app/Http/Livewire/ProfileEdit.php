<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;

class ProfileEdit extends Component
{
    public $countries;
    public $user;

    protected $rules = [
        'user.first_name'  => 'required|min:2',
        'user.last_name'   => 'required|min:2',
        'user.sex'         => 'required|in:m,f',
        'user.nationality' => 'required|exists:countries,id',
    ];

    public function mount()
    {
        $this->countries = Country::all();

        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.profile-edit');
    }

    public function save()
    {
        $this->validate();

        $this->user->save();

        switch ($this->user->account_type) {
            case 'host':
                return redirect()->route('profile.edit.host');
            case 'traveler':
                return redirect()->route('profile.edit.traveler');
            default:
                return redirect()->route('home');
        }

        // return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
