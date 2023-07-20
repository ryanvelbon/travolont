@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-4 mb-12">
  <div class="flex flex-col sm:flex-row gap-4">

    <section class="sm:w-[300px] shrink-0 sm:rounded-2xl shadow-xl px-8 py-10 bg-white">
      <div class="text-center">
        <img class="mx-auto h-48 w-48 rounded-full md:h-56 md:w-56" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
        <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">Leonard Krasner</h3>
        <p class="text-sm leading-5 text-gray-600 italic">"Jet lag is for amateurs, let's explore!"</p>
        <ul role="list" class="mt-6 flex justify-center gap-x-6">
          <li>
            <a href="#" class="text-gray-600 hover:text-gray-500">
              <span class="sr-only">Twitter</span>
              <i class="fa-brands fa-twitter fa-xl"></i>
            </a>
          </li>
          <li>
            <a href="#" class="text-gray-600 hover:text-gray-500">
              <span class="sr-only">LinkedIn</span>
              <i class="fa-brands fa-linkedin fa-xl"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="mt-12">
        <ul class="text-sm text-gray-600 grid grid-cols-1 gap-y-2">

          <li class="flex justify-between">
            <div class="flex items-center">
              <i class="fa-solid w-4 fa-venus-mars"></i>
              <span class="ml-2">Age & Sex</span>
            </div>
            <span class="font-bold truncate">23, Male</span>
          </li>

          <li class="flex justify-between">
            <div class="flex items-center">
              <i class="fa-solid w-4 fa-location-dot"></i>
              <span class="ml-2">From</span>
            </div>
            <span class="font-bold truncate">Malaysia</span>
          </li>

          <li class="flex justify-between">
            <div class="flex items-center">
              <i class="fa-solid w-4 fa-user"></i>
              <span class="ml-2">Member since</span>
            </div>
            <span class="font-bold">Dec 2020</span>
          </li>

          <li class="flex justify-between">
            <div class="flex items-center">
              <i class="fa-solid w-4 fa-briefcase"></i>
              <span class="ml-2">Occupation</span>
            </div>
            <span class="font-bold truncate">Mechanical Engineer</span>
          </li>

          <li class="mt-8 text-green-600">
            <i class="fa-solid w-4 fa-badge-check"></i>
            <span class="ml-2">Phone verified</span>
          </li>

          <li>
            <i class="fa-solid w-4 fa-badge"></i>
            <span class="ml-2">Government ID not verified</span>
          </li>

        </ul>
      </div>
    </section>

    <section class="grow">
      <div x-data="{ tab: 'friends' }" class="bg-white p-4 shadow-md sm:rounded-2xl">
        <header class="sm:flex sm:justify-between space-y-4">
          <div>
            <h2 class="text-2xl font-bold text-gray-900">Leonard Krasner</h2>
            <ul class="text-xs text-gray-400 mt-2">
              <li>43% response rate</li>
              <li>Last login about 9 hours ago</li>
            </ul>
          </div>
          <div>
            <button type="button" class="inline-flex items-center gap-x-2 rounded-full bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:ring-gray-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
              <i class="fa-regular fa-envelope"></i>
              Message
            </button>
            <button type="button" class="inline-flex items-center gap-x-2 rounded-full bg-primary-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
              <i class="fa-regular fa-user-plus"></i>
              Follow
            </button>
          </div>
        </header>

        <div class="border-b border-gray-200">
          <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            <a href="#" @click.prevent="tab = 'about'" :class="tab === 'about' ? 'tab-current' : 'tab-default'" class="tab">
              About
            </a>
            <a href="#" @click.prevent="tab = 'experience'" :class="tab === 'experience' ? 'tab-current' : 'tab-default'" class="tab">
              Experience
            </a>
            <a href="#" @click.prevent="tab = 'references'" :class="tab === 'references' ? 'tab-current' : 'tab-default'" class="tab" aria-current="page">
              References
              <span class="tab-badge" :class="tab === 'references' ? 'tab-badge-current' : 'tab-badge-default'">4</span>
            </a>
            <a href="#" @click.prevent="tab = 'friends'" :class="tab === 'friends' ? 'tab-current' : 'tab-default'" class="tab">
              Friends
              <span class="tab-badge" :class="tab === 'friends' ? 'tab-badge-current' : 'tab-badge-default'">52</span>
            </a>
          </nav>
        </div>

        <!-- Tab Contents -->
        <div x-show="tab === 'about'" class="mt-2">
          @include('partials.about')
        </div>
        <div x-show="tab === 'experience'" class="mt-2">Experience Content</div>
        <div x-show="tab === 'references'" class="mt-2">
          @include('partials.reviews')
        </div>
        <div x-show="tab === 'friends'" class="mt-2">
          @include('partials.friends')
        </div>

      </div>
    </section>

    <aside class="bg-test-2 hidden xl:block">
      suggestions go here
    </aside>
  </div>
</div>
@endsection