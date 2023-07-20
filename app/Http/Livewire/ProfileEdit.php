<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Carbon\Carbon;
use Livewire\Component;

class ProfileEdit extends Component
{
    public $countries;
    public $user;

    public $dob_day;
    public $dob_month;
    public $dob_year;

    protected $rules = [
        'user.first_name'     => 'required|min:2',
        'user.last_name'      => 'required|min:2',
        'user.sex'            => 'required|in:m,f',
        'user.nationality_id' => 'required|exists:countries,id',
        'user.dob'            => 'required|date',

        'dob_day'   => ['required', 'integer', 'between:1,31'],
        'dob_month' => ['required', 'integer', 'between:1,12'],
        'dob_year'  => ['required', 'integer', 'between:1900,2003'],
    ];

    public function mount()
    {
        $this->countries = Country::all();

        $this->user = auth()->user();

        if ($this->user->dob) {
            $this->dob_day = $this->user->dob->day;
            $this->dob_month = $this->user->dob->month;
            $this->dob_year = $this->user->dob->year;
        }
    }

    public function updated()
    {
        $this->user->dob = Carbon::create($this->dob_year, $this->dob_month, $this->dob_day);
    }

    public function render()
    {
        return view('livewire.profile-edit')->extends('layouts.auth', ['showNavbar' => true]);
    }

    public function save()
    {
        $this->validate();

        $this->user->save();

        // return redirect()->back()->with('success', 'Profile updated successfully.');

        switch ($this->user->account_type) {
            case 'host':
                return redirect()->route('profile.edit.host');
            case 'traveler':
                return redirect()->route('profile.edit.traveler');
            default:
                return redirect()->route('home');
        }
    }
}
