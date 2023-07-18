<div class="sm:mx-auto sm:w-full sm:max-w-md shadow-2xl p-5">
    <form
        method="POST"
        wire:submit.prevent="update"
    >
        @csrf

        <h2 class="text-xl font-bold">Edit host profile</h2>

        <div>
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
            <div class="relative mt-2">
                <input wire:model.lazy="host.title" type="text" id="title" class="peer block w-full border-0 bg-gray-50 py-1.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Give a catchy title for the experience you are offering">
                <div class="absolute inset-x-0 bottom-0 border-t border-gray-300 peer-focus:border-t-2 peer-focus:border-indigo-600" aria-hidden="true"></div>
                @error('host.title')
                    <div class="text-red-700 mt-1 text-xs">{{ $message }}</div>
                @endError
            </div>
        </div>

        <div class="mt-4">
            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
            <div class="mt-2">
                <textarea
                    wire:model.lazy="host.description"
                    id="description"
                    spellcheck="false"
                    rows="8"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                ></textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about the experience.</p>
            @error('host.description')
                <div class="text-red-700 mt-1 text-xs">{{ $message }}</div>
            @endError
        </div>

        <div class="mt-4">
            <label>Minimum stay (in days)</label>
            <div>
                <input wire:model.lazy="host.min_stay_days" type="number">
                @error('host.min_stay_days')
                    <div class="text-red-700 mt-1 text-xs">{{ $message }}</div>
                @endError
            </div>
        </div>

        <div class="mt-4">
            <label>Maximum stay (in days)</label>
            <div>
                <input wire:model.lazy="host.max_stay_days" type="number">
                @error('host.max_stay_days')
                    <div class="text-red-700 mt-1 text-xs">{{ $message }}</div>
                @endError
            </div>
        </div>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2">Save</button>
    </form>
</div>
