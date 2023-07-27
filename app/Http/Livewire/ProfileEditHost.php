<?php

namespace App\Http\Livewire;

use App\Models\HostType;
use Livewire\Component;

class ProfileEditHost extends Component
{
    public $host;

    public $step = 1;

    protected $rules = [
        'host.type_id'           => 'required|exists:host_types,id',
        'host.city_id'           => 'required|exists:cities,id',
        'host.title'             => 'required|min:10|max:80',
        'host.description'       => 'required|min:50|max:500',
        'host.max_hours_per_day' => 'required|numeric|min:1|max:12',
        'host.n_days_per_week'   => 'required|numeric|min:1|max:7',
        'host.min_stay_days'     => 'required|numeric|min:1|max:180',
        'host.max_stay_days'     => 'required|numeric|min:1|max:180',
        'host.website'           => 'required',
    ];

    protected $listeners = ['citySelected' => 'onCitySelected'];

    protected $messages = [
        'host.type_id.required' => 'Please select a category',
        'host.type_id.exists'   => 'The category you have chosen is invalid.',
        'host.city_id.required' => 'Search a city and select from the suggested results',
        'host.city_id.exists'   => 'Select a city from the autocomplete suggestions',
    ];

    public function mount()
    {
        $this->host = auth()->user()->hostProfile;
    }

    public function render()
    {
        return view('livewire.profile-edit-host', [
            'hostTypes' => HostType::all(),
        ])->extends('layouts.auth', ['showNavbar' => true]);
    }

    public function onCitySelected($cityId)
    {
        $this->host->city_id = $cityId;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function step1()
    {
        $this->validateOnly('host.type_id');
        $this->host->save();
        $this->step = 2;
    }

    public function step2()
    {
        $this->validateOnly('host.city_id');
        $this->host->save();
        $this->step = 3;
    }

    public function step3()
    {
        $this->validateOnly('host.max_hours_per_day');
        $this->validateOnly('host.n_days_per_week');
        $this->validateOnly('host.min_stay_days');
        $this->validateOnly('host.max_stay_days');
        $this->host->save();
        $this->step = 4;
    }

    public function step4()
    {
        $this->validateOnly('host.website');
        $this->host->save();
        $this->step = 5;
    }

    public function step5()
    {
        $this->step = 6;
    }

    public function step6()
    {
        $this->validateOnly('host.title');
        $this->validateOnly('host.description');
        $this->host->save();
        $this->step = 7;
    }

    public function step7()
    {
        $this->step = 8;
    }
}
