@extends('layouts.base')

@section('body')
<section class="bg-white relative" style="background-image: url('');">
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
                            <a href="{{ route('login') }}" class="btn btn-secondary">Log in</a>
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>
        <div class="container py-32">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="bg-test-1 md:col-span-2">
                    <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-800">
                        <span class="text-primary-500 font-serif">Explore the World</span>,
                        <br>
                        Create Impact!
                    </h2>
                    <p class="mt-4 text-xl md:text-2xl text-slate-700">Experience authentic local cultures, contribute to communities, and make lasting friendships as you volunteer and travel.</p>
                    <div class="mt-8">
                        <a href="{{ route('register') }}" class="btn btn-secondary btn-xl">Join the community</a>
                    </div>
                </div>
                <div>
                    <!-- keep this empty -->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-primary-600 border-t-8 border-secondary-300">
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
            <img class="mx-auto" src="https://placehold.co/600x400">
            <h2 class="text-gray-800 text-2xl font-bold mt-6 font-serif">Find a host</h2>
            <p class="text-gray-500 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <a href="{{ route('hosts.index') }}" class="btn btn-lg btn-primary mt-5">Search Hosts</a>
        </div>
    </div>
</section>
<section class="py-12">
    <div class="text-center py-12">
        <h2 class="text-gray-800">
            <span class="text-base sm:text-lg md:text-xl uppercase">Explore</span>
            <br>
            <span class="text-4xl sm:text-5xl md:text-6xl font-bold font-serif">Volunteer Programs</span>
        </h2>
        <p class="text-lg md:text-2xl text-gray-700 mt-6">Whether you're an expert or looking to try something new, we have a place for you.</p>
    </div>
    <div x-data="{ page: 1, perPage: 4, totalItems: {{ $categories->count() }}, totalPages: Math.ceil({{ $categories->count() }} / 4) }" class="flex justify-center gap-8 items-center">
        <button @click="page = page > 1 ? page - 1 : totalPages" class="hover:bg-gray-100 p-4 rounded-full"><i class="fa-regular fa-chevron-left text-2xl"></i></button>
        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($categories as $category)
                <li x-show="Math.ceil(({{ $loop->index + 1 }}) / perPage) === page">
                    <a href="">
                        <div class="bg-gray-200 h-64 w-64 p-8">
                            {{ $category->title }}
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        <button @click="page = page < totalPages ? page + 1 : 1" class="hover:bg-gray-100 p-4 rounded-full"><i class="fa-regular fa-chevron-right text-2xl"></i></button>
    </div>
</section>
<section class="bg-secondary-300 py-16">
    <div id="testimonial-container" class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 relative h-96 md:h-64">
        <div class="testimonial">
            <div>
                <img src="{{ asset('assets/img/testimonial1.jpg') }}" class="rounded-full w-64">
            </div>
            <div class="flex-1">
                <figcaption>
                    <span class="font-bold">Gabriele Esposito</span>
                    <span class="text-sm">Traveler</span>
                </figcaption>
                <blockquote>Traveling on a budget during my gap year wasn't just possible, it was incredible!</blockquote>
            </div>
        </div>
        <div class="testimonial">
            <div>
                <img src="{{ asset('assets/img/testimonial2.jpg') }}" class="rounded-full w-64">
            </div>
            <div class="flex-1">
                <figcaption>
                    <span class="font-bold">Lisa Schäfer</span>
                    <span class="text-sm">Traveler</span>
                </figcaption>
                <blockquote>Every destination taught me more about myself and the world than I ever imagined possible.</blockquote>
            </div>
        </div>
        <div class="testimonial">
            <div>
                <img src="{{ asset('assets/img/testimonial3.jpg') }}" class="rounded-full w-64">
            </div>
            <div class="flex-1">
                <figcaption>
                    <span class="font-bold">Bill & Anne</span>
                    <span class="text-sm">Host</span>
                </figcaption>
                <blockquote>Our farmstay has become a vibrant community thanks to the diverse and wonderful guests who have graced our home.</blockquote>
            </div>
        </div>
    </div>
</section>
<section class="bg-white">
    <div class="text-center pt-16">
        <h2 class="text-gray-800 text-4xl sm:text-5xl md:text-6xl font-bold font-serif">Your next adventure awaits!</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 p-8">
        @foreach($featCountries as $country)
        <a href="#">
            <div class="bg-gray-200 hover:bg-gray-100 hover:shadow-lg flex flex-col gap-y-2 h-64 justify-center items-center rounded-xl">
                <img class="w-16 h-12" src="{{ asset('assets/flags/countries/svg/'. $country->iso2 . '.svg') }}">
                <h3 class="text-2xl font-bold">{{ $country->name }}</h3>
                <span class="text-sm text-gray-600">{{ $country->native }}</span>
                <span class="text-gray-700">{{ $country->hosts_count }} hosts</span>
                <span class="text-gray-700">{{ $country->travelers_count }} travelers</span>
            </div>
        </a>
        @endforeach
    </div>
</section>
<section class="bg-white">
    <div class="container py-24 sm:py-32 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-bold font-serif tracking-tight text-gray-800 sm:text-4xl"><span class="text-primary-600">Ready to make a difference?</span><br>Join the community today.</h2>
        <div class="mt-10 flex items-center gap-x-3 lg:mt-0 lg:flex-shrink-0">
            <a href="#" class="btn btn-primary">Get started</a>
            <a href="#" class="btn btn-secondary">Learn more <span aria-hidden="true">→</span></a>
        </div>
    </div>
</section>
@include('partials.footer')
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let testimonials = document.querySelectorAll('.testimonial');
    let currentIndex = 0;

    function showTestimonial(index) {
        testimonials.forEach((testimonial, i) => {
            if (i === index) {
                testimonial.classList.add('show');
            } else {
                testimonial.classList.remove('show');
            }
        });
    }

    showTestimonial(currentIndex);

    setInterval(() => {
        currentIndex = (currentIndex + 1) % testimonials.length;
        showTestimonial(currentIndex);
    }, 7000);
});
</script>
@endsection