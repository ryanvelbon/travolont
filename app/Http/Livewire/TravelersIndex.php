<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TravelersIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $members = User::where('account_type', 'traveler')
                        ->paginate(20);

        return view('livewire.travelers-index', [
            'members' => $members,
        ]);
    }
}
