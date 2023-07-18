<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileEditHost extends Component
{
    public $host;

    protected $rules = [
        'host.title'         => 'required|min:10|max:80',
        'host.description'   => 'required|min:50|max:500',
        'host.min_stay_days' => 'required|numeric|min:1|max:180',
        'host.max_stay_days' => 'required|numeric|min:1|max:180',
    ];

    public function mount()
    {
        $this->host = auth()->user()->hostProfile;
    }

    public function render()
    {
        return view('livewire.profile-edit-host')->extends('layouts.auth', ['showNavbar' => true]);
    }

    public function update()
    {
        $this->validate();

        $this->host->save();

        return redirect()->back()->with('success', 'Your host profile has been updated!');
    }
}
