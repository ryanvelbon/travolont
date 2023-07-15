<?php

namespace App\Http\Livewire;

use App\Models\Host;
use Livewire\Component;
use Livewire\WithPagination;

class HostsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $hosts = Host::paginate(10);

        return view('livewire.hosts-index', [
            'hosts' => $hosts,
        ]);
    }
}
