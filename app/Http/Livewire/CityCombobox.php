<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;

class CityCombobox extends Component
{
    public $search = '';

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
