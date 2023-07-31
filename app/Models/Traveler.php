<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traveler extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'current_city_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currentCity()
    {
        return $this->belongsTo(City::class, 'current_city_id');
    }

    /**
     * Returns the services the traveler is offering.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
