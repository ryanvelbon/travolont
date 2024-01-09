<?php

namespace App\Http\Livewire;

use App\Models\HostType;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\Attributes\On;

class ProfileEditHost extends Component
{
    public $step = 1;

    public $typeId;
    public $cityId;
    public $isRegisteredBiz;
    public $bizName;
    public $bizType;
    public $bizRegNo;
    public $bizAddress;
    public $bizEmail;
    public $bizPhone;
    public $bizWebsite;
    public $title;
    public $description;
    public $nDaysPerWeek;
    public $maxHoursPerDay;
    public $minStayDays;
    public $maxStayDays;
    public $selectedServices = [];

    protected $stepRules = [
        1 => [
            'typeId' => 'required|exists:host_types,id',
        ],
        2 => [
            'cityId' => 'required|exists:cities,id',
        ],
        3 => [
            'isRegisteredBiz' => 'required',
            'bizName' => 'nullable|min:3|max:60',
            'bizType' => 'nullable',
            'bizRegNo' => 'nullable',
            'bizAddress' => 'nullable',
            'bizEmail' => 'nullable|email',
            'bizPhone' => 'nullable',
            'bizWebsite' => 'nullable',
        ],
        4 => [
            'nDaysPerWeek' => 'required|numeric|min:1|max:7',
            'maxHoursPerDay' => 'required|numeric|min:1|max:12',
            'minStayDays' => 'required|numeric|min:1|max:180',
            'maxStayDays' => 'required|numeric|min:1|max:180',
        ],
        5 => [
            'selectedServices' => 'required|array|min:3|distinct',
        ],
        6 => [
            'title' => 'required|min:10|max:80',
            'description' => 'required|min:50|max:500',
        ],
    ];

    protected $messages = [
        'typeId.required' => 'Please select a category',
        'typeId.exists' => 'The category you have chosen is invalid.',
        'cityId.required' => 'Search a city and select from the suggested results',
        'cityId.exists' => 'Select a city from the autocomplete suggestions',
        'selectedServices.required' => 'Please select the services you require.',
        'selectedServices.min' => 'Please select 3 or more services',
    ];

    public function mount()
    {
        $host = auth()->user()->hostProfile;

        $this->typeId = $host->type_id;
        $this->cityId = $host->city_id;
        $this->isRegisteredBiz = $host->is_registered_biz;
        $this->bizName = $host->biz_name;
        $this->bizType = $host->biz_type;
        $this->bizRegNo = $host->biz_reg_no;
        $this->bizAddress = $host->biz_address;
        $this->bizEmail = $host->biz_email;
        $this->bizPhone = $host->biz_phone;
        $this->bizWebsite = $host->biz_website;
        $this->title = $host->title;
        $this->description = $host->description;
        $this->nDaysPerWeek = $host->n_days_per_week;
        $this->maxHoursPerDay = $host->max_hours_per_day;
        $this->minStayDays = $host->min_stay_days;
        $this->maxStayDays = $host->max_stay_days;
        $this->selectedServices = $host->helpNeeded->pluck('id')->toArray();
    }

    public function updateProfile()
    {
        $host = auth()->user()->hostProfile;

        $host->fill([
            'type_id' => $this->typeId,
            'city_id' => $this->cityId,
            'is_registered_biz' => $this->isRegisteredBiz,
            'biz_name' => $this->bizName,
            'biz_type' => $this->bizType,
            'biz_reg_no' => $this->bizRegNo,
            'biz_address' => $this->bizAddress,
            'biz_email' => $this->bizEmail,
            'biz_phone' => $this->bizPhone,
            'biz_website' => $this->bizWebsite,
            'title' => $this->title,
            'description' => $this->description,
            'max_hours_per_day' => $this->maxHoursPerDay,
            'n_days_per_week' => $this->nDaysPerWeek,
            'min_stay_days' => $this->minStayDays,
            'max_stay_days' => $this->maxStayDays,
        ]);

        $host->helpNeeded()->sync($this->selectedServices);

        $host->save();
    }

    public function render()
    {
        $categories = Cache::rememberForever('host_types', function () {
            return HostType::all();
        });

        $services = Cache::rememberForever('services', function () {
            return Service::orderBy('order')->get();
        });

        return view('livewire.profile.host.edit', [
            'categories' => $categories,
            'services'  => $services,
        ])->extends('layouts.auth', ['showNavbar' => true, 'bgColor' => 'bg-secondary-300']);
    }

    #[On('city-selected')]
    public function updateCity($id)
    {
        $this->cityId = $id;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function nextStep()
    {
        if (in_array($this->step, array_keys($this->stepRules))) {
            $this->validate($this->stepRules[$this->step]);
        }

        if ($this->step == 7) {
            $this->updateProfile();
        }

        $this->step++;
    }
}
