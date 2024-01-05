<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileEdit extends Component
{
    use WithFileUploads;

    public $user;

    public $dob_day;
    public $dob_month;
    public $dob_year;

    public $avatar;

    protected $rules = [
        'user.first_name'     => 'required|min:2',
        'user.last_name'      => 'required|min:2',
        'user.sex'            => 'required|in:m,f',
        'user.nationality_id' => 'required|exists:countries,id',
        'user.dob'            => 'required|date',

        'avatar' => 'nullable|image|max:1000', // 1 MB

        'dob_day'   => ['required', 'integer', 'between:1,31'],
        'dob_month' => ['required', 'integer', 'between:1,12'],
        'dob_year'  => ['required', 'integer', 'between:1900,2003'],
    ];

    public function mount()
    {
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
        $countries = Cache::rememberForever('countries', function () {
            return Country::all();
        });

        return view('livewire.profile.edit', [
            'countries' => $countries,
        ])->extends('layouts.auth', ['showNavbar' => true]);
    }

    public function save()
    {
        $this->validate();

        if ($this->avatar) {
            $filename = $this->avatar->store('/', 'images');
            $this->user->avatar = $filename;
            $this->user->save();
        }

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
