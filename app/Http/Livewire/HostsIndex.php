<?php

namespace App\Http\Livewire;

use App\Models\Host;
use App\Models\HostType;
use Livewire\Component;
use Livewire\WithPagination;

class HostsIndex extends Component
{
    use WithPagination;

    public $city;
    public $selectedHostTypes = [];

    protected $listeners = ['citySelected' => 'onCitySelected'];

    public function onCitySelected($cityId)
    {
        $this->city = $cityId;
    }

    public function updated()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Host::query();

        if (!empty($this->city)) {
            $query->where('city_id', $this->city);
        }

        if (!empty($this->selectedHostTypes)) {
            $query->whereIn('type_id', $this->selectedHostTypes);
        }

        $hosts = $query->paginate(10);

        return view('livewire.hosts-index', [
            'hosts' => $hosts,
            'hostTypes' => HostType::all(),
        ]);
    }
}
