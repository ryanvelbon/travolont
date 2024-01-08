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

    public $firstName, $lastName, $dob, $sex, $nationalityId, $avatar;
    public $dobDay, $dobMonth, $dobYear;

    protected $rules = [
        'firstName'     => 'required|min:2',
        'lastName'      => 'required|min:2',
        'dob'           => 'required|date',
        'sex'           => 'required|in:m,f',
        'nationalityId' => 'required|exists:countries,id',
        'avatar'        => 'nullable|image|max:1000',

        'dobDay'   => ['required', 'integer', 'between:1,31'],
        'dobMonth' => ['required', 'integer', 'between:1,12'],
        'dobYear'  => ['required', 'integer', 'between:1900,2003'],
    ];

    protected $messages = [
        'firstName.required' => 'What is your first name?',
        'lastName.required' => 'What is yout last name?',
        'nationalityId.required' => 'Which country were you born in?',
        'sex.required' => 'What is your gender?',
        'dobDay.required' => 'Pick a day',
        'dobMonth.required' => 'Pick a month.',
        'dobYear.required' => 'Pick a year',
        'dob.required' => 'When were you born?',

    ];

    public function mount()
    {
        $user = auth()->user();

        $this->firstName = $user->first_name ?? '';
        $this->lastName = $user->last_name ?? '';
        $this->dob = $user->dob ? $user->dob->format('Y-m-d') : null;
        $this->sex = $user->sex ?? null;
        $this->nationalityId = $user->nationality_id ?? null;
        $this->avatar = $user->avatar ?? null;

        if ($user->dob) {
            $this->dobDay = $user->dob->day;
            $this->dobMonth = $user->dob->month;
            $this->dobYear = $user->dob->year;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if ($propertyName === 'dobDay' || $propertyName === 'dobMonth' || $propertyName === 'dobYear') {
            $this->dob = Carbon::create($this->dobYear, $this->dobMonth, $this->dobDay)->format('Y-m-d');
        }
    }

    public function render()
    {
        $countries = Cache::rememberForever('countries', function () {
            return Country::all();
        });

        return view('livewire.profile.edit', [
            'countries' => $countries,
        ])->extends('layouts.auth', ['showNavbar' => true, 'bgColor' => 'bg-secondary-300']);
    }

    public function save()
    {
        $this->validate();

        $user = auth()->user();

        $user->first_name = $this->firstName;
        $user->last_name = $this->lastName;
        $user->dob = $this->dob;
        $user->sex = $this->sex;
        $user->nationality_id = $this->nationalityId;

        if ($this->avatar) {
            $filename = $this->avatar->store('/', 'images');
            $user->avatar = $filename;
        }

        $user->save();

        session()->flash('success', 'Profile successfully updated.');

        switch ($user->account_type) {
            case 'host':
                return redirect()->route('profile.edit.host');
            case 'traveler':
                return redirect()->route('profile.edit.traveler');
            default:
                return redirect()->route('home');
        }
    }
}
