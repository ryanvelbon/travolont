<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser, HasName
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'account_type',
        'username',
        'email',
        'password',

        'first_name',
        'last_name',
        'dob',
        'sex',
        'nationality_id',
        'bio',
        'avatar',
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

    public function canAccessFilament(): bool
    {
        return str_ends_with($this->email, 'travolont.com') && $this->hasVerifiedEmail();
    }

    public function getFilamentName(): string
    {
        return $this->username;
    }

    public function getAgeAttribute()
    {
        return $this->dob->age;
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function countryOfOrigin()
    {
        return $this->belongsTo(Country::class, 'nationality_id');
    }

    public function hostProfile()
    {
        return $this->hasOne(Host::class);
    }

    public function travelerProfile()
    {
        return $this->hasOne(Traveler::class);
    }

    public function avatarUrl()
    {
        return $this->avatar
            ? Storage::disk('avatars')->url($this->avatar)
            : Storage::disk('avatars')->url('default.jpg');
    }
}
