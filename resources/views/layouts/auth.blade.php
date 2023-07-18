@extends('layouts.base')

@isset($showNavbar)
<nav class="bg-white shadow-md mb-2">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="flex h-12 items-center justify-between">
            <a href="{{ route('home') }}">home</a>
            <a href="">something</a>
        </div>
    </div>
</nav>
@endisset

@section('body')
    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
