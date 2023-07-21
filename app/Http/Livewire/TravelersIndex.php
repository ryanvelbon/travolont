<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TravelersIndex extends Component
{
    use WithPagination;

    public $sex;
    public $nationality;

    public function render()
    {
        $query = User::where('account_type', 'traveler');

        if (!empty($this->sex)) {
            $query->where('sex', $this->sex);
        }

        if (!empty($this->nationality)) {
            $query->where('nationality_id', $this->nationality);
        }

        $members = $query->paginate(20);

        return view('livewire.travelers-index', [
            'members' => $members,

            'countries' => Country::all(),
        ]);
    }
}
