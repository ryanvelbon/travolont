<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
    ];

    public $timestamps = false;

    /**
     * Returns the hosts who require this service.
     */
    public function neededBy()
    {
        return $this->belongsToMany(Host::class);
    }

    /**
     * Returns the travelers who are offering this service.
     */
    public function offeredBy()
    {
        return $this->belongsToMany(Traveler::class);
    }
}
