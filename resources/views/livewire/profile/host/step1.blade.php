<h2>Which category are you?</h2>
<p class="mb-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod?</p>
<div
    x-data="{ selectedCategory: @entangle('typeId') }"
    class="grid grid-cols-1 sm:grid-cols-2 gap-3"
>
    @foreach($categories as $category)
        <div
            class="py-3 flex justify-center items-center cursor-pointer select-none border border-black border-t border-l border-2"
            :class="selectedCategory == {{ $category->id }} ? 'bg-secondary-300' : 'bg-white hover:bg-secondary-100'"
            @click="$wire.set('typeId', {{ $category->id }})"
        >
            <i class="fa-solid fa-{{ $category->icon }} mr-4"></i>
            <span>{{ $category->title }}</span>
        </div>
    @endforeach

    @error('typeId')
        <p class="input-error-msg">{{ $message }}</p>
    @endError
</div>