<?php

namespace App\Http\Livewire;

use App\Models\HostType;
use App\Models\Service;
use Livewire\Component;

class ProfileEditHost extends Component
{
    public $host;

    public $selectedServices;

    public $step = 1;

    protected $rules = [
        'host.type_id'           => 'required|exists:host_types,id',
        'host.city_id'           => 'required|exists:cities,id',
        'host.is_registered_biz' => 'required',
        'host.biz_name'          => '',
        'host.biz_type'          => '',
        'host.biz_reg_no'        => '',
        'host.biz_address'       => '',
        'host.biz_email'         => 'email',
        'host.biz_phone'         => '',
        'host.biz_website'       => '',
        'host.title'             => 'required|min:10|max:80',
        'host.description'       => 'required|min:50|max:500',
        'host.max_hours_per_day' => 'required|numeric|min:1|max:12',
        'host.n_days_per_week'   => 'required|numeric|min:1|max:7',
        'host.min_stay_days'     => 'required|numeric|min:1|max:180',
        'host.max_stay_days'     => 'required|numeric|min:1|max:180',

        'selectedServices'       => 'required|array|min:3|distinct',
    ];

    protected $listeners = ['citySelected' => 'onCitySelected'];

    protected $messages = [
        'host.type_id.required' => 'Please select a category',
        'host.type_id.exists'   => 'The category you have chosen is invalid.',
        'host.city_id.required' => 'Search a city and select from the suggested results',
        'host.city_id.exists'   => 'Select a city from the autocomplete suggestions',
        'selectedServices.required' => 'Please select the services you require.',
        'selectedServices.min'      => 'Please select 3 or more services',
    ];

    public function mount()
    {
        $this->host = auth()->user()->hostProfile;

        $this->selectedServices = $this->host->helpNeeded->pluck('id')->toArray();
    }

    public function render()
    {
        $services = Service::orderBy('order')->get();

        return view('livewire.profile.host.edit', [
            'hostTypes' => HostType::all(),
            'services'  => $services,
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
        $this->validateOnly('host.is_registered_biz');
        $this->validateOnly('host.biz_name');
        $this->validateOnly('host.biz_type');
        $this->validateOnly('host.biz_reg_no');
        $this->validateOnly('host.biz_address');
        $this->validateOnly('host.biz_email');
        $this->validateOnly('host.biz_phone');
        $this->validateOnly('host.biz_website');
        $this->host->save();
        $this->step = 4;
    }

    public function step4()
    {
        $this->validateOnly('host.max_hours_per_day');
        $this->validateOnly('host.n_days_per_week');
        $this->validateOnly('host.min_stay_days');
        $this->validateOnly('host.max_stay_days');
        $this->host->save();
        $this->step = 5;
    }

    public function step5()
    {
        $this->validateOnly('selectedServices');
        $this->host->helpNeeded()->sync($this->selectedServices);
        $this->host->save();
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
