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
<div class="bg-primary-200">
    <h2 class="text-6xl font-bold text-center pt-32">Connect with Travelers & Hosts</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 py-24">
        @for($i=0; $i<2; $i++)
        <div class="bg-white text-center py-16 px-8 mx-auto max-w-lg">
            <h2 class="text-gray-800 text-2xl font-bold">Dolor sit amet elit</h2>
            <p class="text-gray-700 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <a href="" class="btn btn-primary-outline mt-5">Lorem Dolor</a>
        </div>
        @endfor
    </div>
</div>
<div class="bg-white">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 p-8">
        @foreach($featCountries as $country)
        <a href="#">
            <div class="bg-gray-200 flex flex-col gap-y-2 justify-center items-center h-40 rounded-xl">
                <img class="w-16 h-12" src="{{ asset('images/flags/countries/svg/'. $country->iso2 . '.svg') }}">
                <h3 class="text-2xl font-bold">{{ $country->name }}</h3>
                <span class="text-sm text-gray-600">{{ $country->native }}</span>
                <span class="text-gray-700">{{ $country->hosts()->count() }} hosts</span>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
