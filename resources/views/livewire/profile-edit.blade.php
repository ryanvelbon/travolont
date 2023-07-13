<form
    method="POST"
    wire:submit.prevent="save"
    class="mx-auto max-w-2xl px-4 py-4 sm:px-6 lg:px-8 bg-gray-100"
>
    @csrf

    @if(session('success'))
        <div class="bg-green-200 text-green-700 text-sm p-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="firstName">First Name</label>

            <div>
                <input wire:model.lazy="firstName" id="firstName" type="text">
                @error('firstName')
                    <div class="text-red-700 mt-1 text-xs">{{ $message }}</div>
                @endError
            </div>
        </div>

        <div>
            <label for="lastName">Last Name</label>

            <div>
                <input wire:model.lazy="lastName" id="lastName" type="text">
                @error('lastName')
                    <div class="text-red-700 mt-1 text-xs">{{ $message }}</div>
                @endError
            </div>
        </div>
    </div>

    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2">Save</button>
</form>