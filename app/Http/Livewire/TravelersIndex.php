<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TravelersIndex extends Component
{
    use WithPagination;

    public $sex;

    public function render()
    {
        $query = User::where('account_type', 'traveler');

        if (!empty($this->sex)) {
            $query->where('sex', $this->sex);
        }

        $members = $query->paginate(20);

        return view('livewire.travelers-index', [
            'members' => $members,
        ]);
    }
}
