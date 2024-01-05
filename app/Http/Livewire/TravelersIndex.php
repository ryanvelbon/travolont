<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class TravelersIndex extends Component
{
    use WithPagination;

    public $sex;
    public $nationality;
    public $minAge = 18;
    public $maxAge = 80;
    public $currentCity;

    protected $listeners = ['citySelected' => 'onCitySelected'];

    protected $rules = [
        'minAge' => 'numeric|min:18',
        'maxAge' => 'numeric|min:18',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        // ensure maxAge is greater than minAge
        if ($this->maxAge <= $this->minAge) {
            $this->addError('maxAge', 'The max age must be greater than min age.');
        }

        $this->resetPage();
    }

    public function render()
    {
        $countries = Cache::rememberForever('countries', function () {
            return Country::all();
        });

        $query = User::travelers();

        if (!empty($this->sex)) {
            $query->where('sex', $this->sex);
        }

        if (!empty($this->nationality)) {
            $query->where('nationality_id', $this->nationality);
        }

        if (!empty($this->minAge)) {
            $bornBefore = Carbon::now()->subYears($this->minAge);
            $query->where('dob', '<=', $bornBefore);
        }

        if (!empty($this->maxAge)) {
            $bornAfter = Carbon::now()->subYears($this->maxAge + 1);
            $query->where('dob', '>=', $bornAfter);
        }

        if (!empty($this->currentCity)) {
            $query->whereHas('travelerProfile', function ($query) {
                $query->where('current_city_id', $this->currentCity);
            });
        }

        $query->with('travelerProfile.currentCity.country', 'countryOfOrigin');

        $members = $query->paginate(12);

        return view('livewire.profile.traveler.index', [
            'members' => $members,
            'countries' => $countries,
        ]);
    }

    public function onCitySelected($cityId)
    {
        $this->currentCity = $cityId;
    }
}
