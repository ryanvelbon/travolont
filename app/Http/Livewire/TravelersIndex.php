<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TravelersIndex extends Component
{
    use WithPagination;

    public $sex;
    public $nationality;
    public $minAge = 18;
    public $maxAge = 80;

    protected $rules = [
        'minAge' => 'numeric|min:18',
        'maxAge' => 'numeric|min:18',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        // ensure maxAge is greater than minAge
        if ($this->maxAge <= $this->minAge) {
            $this->addError('maxAge', 'The max age must be greater than min age.');
        }
    }

    public function render()
    {
        $query = User::where('account_type', 'traveler');

        if (!empty($this->sex)) {
            $query->where('sex', $this->sex);
        }

        if (!empty($this->nationality)) {
            $query->where('nationality_id', $this->nationality);
        }

        if (!empty($this->minAge)) {
            $bornBefore = Carbon::now()->subYears($this->minAge);
            $query->where('dob', '<=', $bornBefore);
        }

        if (!empty($this->maxAge)) {
            $bornAfter = Carbon::now()->subYears($this->maxAge + 1);
            $query->where('dob', '>=', $bornAfter);
        }

        $members = $query->paginate(20);

        return view('livewire.travelers-index', [
            'members' => $members,

            'countries' => Country::all(),
        ]);
    }
}
