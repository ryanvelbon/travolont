<p class="text-gray-800 text-base sm:text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod?</p>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-1 py-4">
    @foreach($hostTypes as $hostType)
        <div class="py-3 flex justify-center items-center bg-gray-200 hover:bg-gray-300 cursor-pointer">
            <i class="fa-solid fa-{{ $hostType->icon }} mr-4"></i>
            <span>{{ $hostType->title }}</span>
        </div>
    @endforeach
</div>