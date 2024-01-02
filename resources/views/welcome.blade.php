@extends('layouts.base')

@section('body')
<div class="bg-white relative" style="background-image: url('');">
    <div class="bg-white bg-opacity-80 absolute inset-0"></div>
    <div class="relative z-10">
        <nav class="bg-transparent">
            <div class="px-6 sm:px-12 lg:px-16">
                <div class="flex h-24 items-center justify-between">
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
                        <div class="text-sm sm:text-base">
                            <a href="{{ route('login') }}" class="px-2 sm:mr-4 hover:text-primary-500">Log in</a>
                            <a href="{{ route('register') }}" class="px-2 hover:text-primary-500">Register</a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-32">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="bg-test-1 md:col-span-2">
                    <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-800">
                        <span class="text-primary-500 font-serif">Explore the World</span>,
                        <br>
                        Create Impact!
                    </h2>
                    <p class="mt-4 text-xl md:text-2xl text-slate-700">Experience authentic local cultures, contribute to communities, and make lasting friendships as you volunteer and travel.</p>
                    <div class="mt-8">
                        <a href="{{ route('register') }}" class="font-bold bg-primary-500 hover:bg-white text-white hover:text-black px-6 py-3 text-xl rounded-md border-t border-l border-4 border-black transition-all duration-300 ease-in-out">Join the community</a>
                    </div>
                </div>
                <div>
                    <!-- keep this empty -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-primary-600">
    <h2 class="text-white text-center pt-32">
        <span class="text-base sm:text-lg md:text-xl uppercase">Connect with</span>
        <br>
        <span class="text-4xl sm:text-5xl md:text-6xl font-bold font-serif">Travelers & Hosts</span>
    </h2>
    <div class="grid grid-cols-1 lg:grid-cols-2 px-4 py-24 mx-auto max-w-5xl gap-6">
        <div class="bg-white text-center pt-8 pb-12 px-8 rounded-lg">
            <img class="mx-auto" src="https://placehold.co/600x400">
            <h2 class="text-gray-800 text-2xl font-bold mt-6 font-serif">Find a travel buddy</h2>
            <p class="text-gray-500 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <a href="{{ route('travelers.index') }}" class="btn btn-lg btn-primary mt-5">Search Travelers</a>
        </div>
        <div class="bg-white text-center pt-8 pb-12 px-8 rounded-lg">
            <img src="https://placehold.co/600x400">
            <h2 class="text-gray-800 text-2xl font-bold mt-6 font-serif">Find a host</h2>
            <p class="text-gray-500 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <a href="{{ route('hosts.index') }}" class="btn btn-lg btn-primary mt-5">Search Hosts</a>
        </div>
    </div>
</div>
<div class="bg-white">
    <div class="text-center pt-16">
        <h2 class="text-gray-800 text-4xl sm:text-5xl md:text-6xl font-bold font-serif">Your next adventure awaits!</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 p-8">
        @foreach($featCountries as $country)
        <a href="#">
            <div class="bg-gray-200 hover:bg-gray-100 hover:shadow-lg flex flex-col gap-y-2 h-64 justify-center items-center rounded-xl">
                <img class="w-16 h-12" src="{{ asset('images/flags/countries/svg/'. $country->iso2 . '.svg') }}">
                <h3 class="text-2xl font-bold">{{ $country->name }}</h3>
                <span class="text-sm text-gray-600">{{ $country->native }}</span>
                <span class="text-gray-700">{{ $country->hosts_count }} hosts</span>
                <span class="text-gray-700">{{ $country->travelers_count }} travelers</span>
            </div>
        </a>
        @endforeach
    </div>
</div>
<div class="bg-white">
    <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:flex lg:items-center lg:justify-between lg:px-8">
        <h2 class="text-3xl font-bold font-serif tracking-tight text-gray-800 sm:text-4xl"><span class="text-primary-600">Ready to make a difference?</span><br>Join the community today.</h2>
        <div class="mt-10 flex items-center gap-x-6 lg:mt-0 lg:flex-shrink-0">
            <a href="#" class="rounded-md bg-primary-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Get started</a>
            <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
        </div>
    </div>
</div>
@include('partials.footer')
@endsection
