@extends('layouts.base')

@section('body')
<div class="bg-gray-200">
    <nav class="bg-transparent">
        <div class="px-6 sm:px-12 lg:px-16">
            <div class="flex h-12 items-center justify-between">
                <div class="flex gap-4">
                    <x-logo class="w-auto h-8 mx-auto text-primary-600" />
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-primary-500">Travolont</a>
                </div>
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <div>
                        <a href="{{ route('login') }}" class="px-2">Log in</a>
                        <a href="{{ route('register') }}" class="px-2">Register</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-32">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="bg-test-1 md:col-span-2">
                <h2 class="text-7xl font-bold">Explore the World, Create Impact!</h2>
                <p class="mt-4 text-lg text-slate-700">Experience authentic local cultures, contribute to communities, and make lasting friendships as you volunteer and travel.</p>
                <div class="mt-8">
                    <a href="{{ route('register') }}" class="font-bold bg-primary-500 text-white hover:bg-transparent hover:text-primary-500 hover:ring-2 hover:ring-primary-500 px-6 py-4 text-2xl rounded-xl transition-all duration-300 ease-in-out">Join the community</a>
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
    <div class="grid grid-cols-1 sm:grid-cols-2 py-24 mx-auto max-w-5xl gap-6">
        <div class="bg-white text-center py-16 px-8">
            <h2 class="text-gray-800 text-2xl font-bold">Find a travel buddy</h2>
            <p class="text-gray-500 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <a href="{{ route('travelers.index') }}" class="btn btn-lg btn-primary mt-5">Search Travelers</a>
        </div>
        <div class="bg-white text-center py-16 px-8">
            <h2 class="text-gray-800 text-2xl font-bold">Find a host</h2>
            <p class="text-gray-500 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <a href="{{ route('hosts.index') }}" class="btn btn-lg btn-primary mt-5">Search Hosts</a>
        </div>
    </div>
</div>
<div class="bg-white">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 p-8">
        @foreach($featCountries as $country)
        <a href="#">
            <div class="bg-gray-200 hover:bg-gray-100 hover:shadow-lg flex flex-col gap-y-2 h-64 justify-center items-center rounded-xl">
                <img class="w-16 h-12" src="{{ asset('images/flags/countries/svg/'. $country->iso2 . '.svg') }}">
                <h3 class="text-2xl font-bold">{{ $country->name }}</h3>
                <span class="text-sm text-gray-600">{{ $country->native }}</span>
                <span class="text-gray-700">{{ $country->hosts()->count() }} hosts</span>
                <span class="text-gray-700">{{ $country->travelers()->count() }} travelers</span>
            </div>
        </a>
        @endforeach
    </div>
</div>
<div class="bg-primary-100">
    <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:flex lg:items-center lg:justify-between lg:px-8">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Ready to make a difference?<br>Join the community today.</h2>
        <div class="mt-10 flex items-center gap-x-6 lg:mt-0 lg:flex-shrink-0">
            <a href="#" class="rounded-md bg-primary-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Get started</a>
            <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
        </div>
    </div>
</div>
@include('partials.footer')
@endsection
