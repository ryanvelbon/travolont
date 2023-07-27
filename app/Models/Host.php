<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'city_id',
        'type_id',
        'website',
        'title',
        'description',
        'max_hours_per_day',
        'n_days_per_week',
        'min_stay_days',
        'max_stay_days',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Returns the services the host is looking for.
     */
    public function helpNeeded()
    {
        return $this->belongsToMany(Service::class);
    }

    public function type()
    {
        return $this->belongsTo(HostType::class);
    }
}
