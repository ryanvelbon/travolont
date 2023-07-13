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
                <input wire:model.lazy="user.first_name" id="firstName" type="text">
                @error('user.first_name')
                    <div class="text-red-700 mt-1 text-xs">{{ $message }}</div>
                @endError
            </div>
        </div>

        <div>
            <label for="lastName">Last Name</label>

            <div>
                <input wire:model.lazy="user.last_name" id="lastName" type="text">
                @error('user.last_name')
                    <div class="text-red-700 mt-1 text-xs">{{ $message }}</div>
                @endError
            </div>
        </div>

        <div>
            <label for="nationality" class="block text-sm font-medium leading-6 text-gray-900">Nationality</label>
            <select wire:model.lazy="user.nationality" id="nationality" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option selected>-- select --</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}">{{ $country->name }}</option>
                @endforeach
            </select>
            @error('user.nationality')
                <div class="text-red-700 mt-1 text-xs">{{ $message }}</div>
            @endError
        </div>
    </div>

    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2">Save</button>
</form>