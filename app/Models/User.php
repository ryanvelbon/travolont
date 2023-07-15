<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'account_type',
        'username',
        'email',
        'password',

        'first_name',
        'last_name',
        'dob',
        'sex',
        'nationality',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'dob' => 'date',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function profile()
    {
        if ($this->account_type === 'host') {
            return $this->hasOne(Host::class);
        }
        elseif ($this->account_type === 'traveler') {
            return $this->hasOne(Traveler::class);
        }
        else {
            return null;
        }
    }
}
