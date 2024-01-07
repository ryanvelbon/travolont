<?php

namespace App\Http\Livewire;

use App\Models\Host;
use App\Models\HostType;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class HostsIndex extends Component
{
    use WithPagination;

    public $selectedCity;
    public $selectedHostTypes = [];

    #[On('city-selected')]
    public function updateSelectedCity($id)
    {
        $this->selectedCity = $id;
    }

    public function updated()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        $query = Host::query();

        if (!empty($this->selectedCity)) {
            $query->where('city_id', $this->selectedCity);
        }

        if (!empty($this->selectedHostTypes)) {
            $query->whereIn('type_id', $this->selectedHostTypes);
        }

        $query->with('user', 'type', 'city.country');

        $hosts = $query->paginate(10);

        return view('livewire.profile.host.index', [
            'hosts' => $hosts,
            'hostTypes' => HostType::all(),
        ]);
    }
}
