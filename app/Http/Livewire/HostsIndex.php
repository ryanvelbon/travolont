<?php

namespace App\Http\Livewire;

use App\Models\Host;
use App\Models\HostType;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class HostsIndex extends Component
{
    use WithPagination;

    #[Url]
    public $selectedCity;

    #[Url]
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

        $categories = Cache::rememberForever('host_types', function () {
            return HostType::all();
        });

        return view('livewire.profile.host.index', [
            'hosts' => $hosts,
            'categories' => $categories,
        ]);
    }
}
