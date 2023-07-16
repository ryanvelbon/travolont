<?php

namespace App\Http\Livewire;

use App\Models\Host;
use Livewire\Component;
use Livewire\WithPagination;

class HostsIndex extends Component
{
    use WithPagination;

    public $city;

    protected $listeners = ['citySelected' => 'onCitySelected'];

    public function onCitySelected($cityId)
    {
        $this->city = $cityId;
    }

    public function render()
    {
        $query = Host::query();

        if (!empty($this->city)) {
            $query->where('city_id', $this->city);
        }

        $hosts = $query->paginate(10);

        return view('livewire.hosts-index', [
            'hosts' => $hosts,
        ]);
    }
}
