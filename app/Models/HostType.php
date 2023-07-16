<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostType extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
    ];

    public $timestamps = false;

    public function hosts()
    {
        return $this->hasMany(Host::class);
    }
}
