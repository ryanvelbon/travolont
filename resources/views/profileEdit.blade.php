@extends('layouts.app')

@section('content')
<h2 class="text-2xl">Profile Setup</h2>
<p>This is where you edit your profile.</p>
<div class="bg-blue-100">
    @livewire('profile-edit')  
</div>
@endsection