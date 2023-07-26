@extends('layouts.app')

@section('content')
<div class="bg-gray-200 py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="bg-test-1 md:col-span-2">
                <h2 class="text-7xl font-bold">Explore the World, Create Impact!</h2>
                <p class="mt-4 text-lg text-slate-700">Experience authentic local cultures, contribute to communities, and make lasting friendships as you volunteer and travel.</p>
                <div class="flex space-x-6 mt-4 lg:mt-8">
                    <a href="{{ route('travelers.index') }}" class="bg-primary-500 text-white px-6 py-3 text-lg rounded-xl">Search Travelers</a>
                    <a href="{{ route('hosts.index') }}" class="bg-primary-500 text-white px-6 py-3 text-lg rounded-xl">Search Hosts</a>
                </div>
            </div>
            <div>
                <!-- keep this empty -->
            </div>
        </div>
    </div>
</div>
<div class="bg-white">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 p-8">
        @foreach($featCities as $city)
        <a href="#">
            <div class="bg-gray-200 flex flex-col justify-center items-center h-40 rounded-xl">
                <h3 class="text-2xl font-bold">{{ $city->name }}</h3>
                <span class="text-sm text-gray-600">{{ $city->country->name }}</span>
                <span class="mt-4 text-gray-700">{{ $city->hosts()->count() }} hosts</span>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
