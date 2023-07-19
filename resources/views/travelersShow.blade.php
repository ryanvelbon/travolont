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
              <i class="fa-solid fa-location-dot"></i>
              <span class="ml-2">From</span>
            </div>
            <span class="font-bold truncate">Malaysia</span>
          </li>

          <li class="flex justify-between">
            <div class="flex items-center">
              <i class="fa-solid fa-user"></i>
              <span class="ml-2">Member since</span>
            </div>
            <span class="font-bold">Dec 2020</span>
          </li>

          <li class="flex justify-between">
            <div class="flex items-center">
              <i class="fa-solid fa-briefcase"></i>
              <span class="ml-2">Occupation</span>
            </div>
            <span class="font-bold truncate">Mechanical Engineer</span>
          </li>

          <li class="mt-8 text-green-600">
            <i class="fa-solid fa-badge-check"></i>
            <span class="ml-2">Phone verified</span>
          </li>

          <li>
            <i class="fa-solid fa-badge"></i>
            <span class="ml-2">Government ID not verified</span>
          </li>

        </ul>
      </div>
    </section>

    <section class="grow">
      <div class="bg-white p-4 shadow-md sm:rounded-2xl">
        <header class="sm:flex sm:justify-between">
          <div>
            <ul class="text-xs text-gray-400">
              <li>43% response rate</li>
              <li>Last login about 9 hours ago</li>
            </ul>
          </div>
          <div>
            <button class="btn btn-primary-outline">Button 1</button>
            <button class="btn btn-primary">Button 2</button>
          </div>
        </header>

        <div class="border-b border-gray-200">
          <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            <a href="#" class="tab tab-default">
              About
            </a>
            <a href="#" class="tab tab-default">
              Experience
            </a>
            <a href="#" class="tab tab-current" aria-current="page">
              References
              <span class="tab-badge tab-badge-current">4</span>
            </a>
            <a href="#" class="tab tab-default">
              Friends
              <span class="tab-badge tab-badge-default">52</span>
            </a>
          </nav>
        </div>
      </div>
    </section>

    <aside class="bg-test-2 hidden xl:block">
      suggestions go here
    </aside>
  </div>
</div>
@endsection