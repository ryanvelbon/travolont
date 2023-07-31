<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function hosts()
    {
        return $this->hasManyThrough(Host::class, City::class);
    }

    public function travelers()
    {
        return $this->hasManyThrough(Traveler::class, City::class, 'country_id', 'current_city_id');
    }
}
