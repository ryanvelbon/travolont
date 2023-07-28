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

        'is_registered_biz',
        'biz_name',
        'biz_type',
        'biz_reg_no',
        'biz_address',
        'biz_email',
        'biz_phone',
        'biz_website',

        'type_id',
        'title',
        'description',
        'max_hours_per_day',
        'n_days_per_week',
        'min_stay_days',
        'max_stay_days',
    ];

    public const BIZ_TYPE_SELECT = [
        'individual'  => 'Individual / Sole Trader',
        'partnership' => 'Partnership',
        'private'     => 'Private Limited Company',
        'public'      => 'Public Limited Company',
        'nonprofit'   => 'Nonprofit / NGO',
        'other'       => 'Other',
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
