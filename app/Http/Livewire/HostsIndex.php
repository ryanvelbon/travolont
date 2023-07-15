<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class HostsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $members = User::where('account_type', 'host')
                        ->paginate(10);

        return view('livewire.hosts-index', [
            'members' => $members,
        ]);
    }
}
