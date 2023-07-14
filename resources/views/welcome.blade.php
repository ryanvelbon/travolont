@extends('layouts.app')

@section('content')
<div class="bg-gray-200 py-32">
    <h2 class="text-7xl font-bold">Welcome, traveler!</h2>
</div>
<div class="bg-white">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 p-8">
        @foreach($featCities as $city)
        <a href="#">
            <div class="bg-gray-200 flex flex-col justify-center items-center h-40 rounded-xl">
                <h3 class="text-2xl font-bold">{{ $city->name }}</h3>
                <span class="text-sm text-gray-600">{{ $city->country->name }}</span>
                <span class="mt-4 text-gray-700">200+ hosts</span>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
