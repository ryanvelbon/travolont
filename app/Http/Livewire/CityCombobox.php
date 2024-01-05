<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;

class CityCombobox extends Component
{
    public $query = '';
    public $selectedCityId = null;
    public $cities = [];


    public function updatedSelectedCityId($value)
    {
        $this->dispatch('city-selected', id: $value);
    }

    public function updatedQuery($value)
    {
        if (strlen($value) >= 1) {
            $this->cities = City::query()
                ->with('state')
                ->whereNotNull('order')
                ->where(function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%')
                          ->orWhereHas('state', function ($subQuery) use ($value) {
                              $subQuery->where('name', 'like', '%' . $value . '%');
                          })->orWhereHas('country', function ($subQuery) use ($value) {
                              $subQuery->where('name', 'like', $value . '%');
                          });
                })
                ->orderBy('order', 'asc')
                ->take(10)
                ->get();
        } else {
            $this->cities = [];
        }
    }

    public function render()
    {
        return view('livewire.city-combobox');
    }
}
