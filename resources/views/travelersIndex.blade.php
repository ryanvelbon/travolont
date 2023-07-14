@extends('layouts.app')

@section('content')
<div class="bg-green-200 p-6">
    <p>This is not a Livewire component, but underneath is... </p>
    @livewire('travelers-index') 
</div>
@endsection
