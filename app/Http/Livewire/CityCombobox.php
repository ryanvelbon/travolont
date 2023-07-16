<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;

class CityCombobox extends Component
{
    public $search = '';

    protected $listeners = ['citySelected' => 'onCitySelected'];

    public function onCitySelected($cityId)
    {
        $this->search = City::find($cityId)->name;
    }

    public function render()
    {
        $cities = collect();

        $cities = City::where('name', 'LIKE', $this->search . '%')
                    ->take(10)
                    ->get();

        return view('livewire.city-combobox', [
            'cities' => $cities
        ]);
    }
}
