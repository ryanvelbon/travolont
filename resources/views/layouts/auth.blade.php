@extends('layouts.base')

<div class="relative">
    @isset($showNavbar)
    <nav class="absolute z-10 w-full bg-white shadow-md">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="flex h-12 items-center justify-between">
                <a href="{{ route('home') }}">home</a>
                <a href="">something</a>
            </div>
        </div>
    </nav>
    @endisset

    @section('body')
        <div class="flex flex-col justify-center min-h-screen py-12 sm:px-6 lg:px-8 {{ $bgColor ?? 'bg-gray-50' }}">
            @yield('content')

            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
    @endsection
</div>