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

    <div>
        <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
        <div class="mt-2 flex items-center gap-x-3">
            <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                <img src="{{ auth()->user()->avatarUrl() }}" alt="Profile Photo">
            </span>
            <span class="ml-5 rounded-md shadow-sm">
                <input type="file" wire:model="avatar">
            </span>
        </div>
        @error('avatar')
            <div class="input-error-msg">{{ $message }}</div>
        @endError
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-2 gap-y-6 mt-8">
        <div>
            <label for="firstName">First Name</label>

            <div>
                <input wire:model.lazy="user.first_name" id="firstName" type="text" class="w-full @error('user.first_name') form-input-error @endError">
                @error('user.first_name')
                    <div class="input-error-msg">{{ $message }}</div>
                @endError
            </div>
        </div>

        <div>
            <label for="lastName">Last Name</label>

            <div>
                <input wire:model.lazy="user.last_name" id="lastName" type="text" class="w-full @error('user.last_name') form-input-error @endError">
                @error('user.last_name')
                    <div class="input-error-msg">{{ $message }}</div>
                @endError
            </div>
        </div>

        <div>
            <label for="nationality">Nationality</label>
            <select
                wire:model.lazy="user.nationality_id"
                id="nationality"
                class="mt-2 block w-full"
            >
                <option selected>your country of birth</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}">{{ $country->name }}</option>
                @endforeach
            </select>
            @error('user.nationality_id')
                <div class="input-error-msg">{{ $message }}</div>
            @endError
        </div>

        <div x-data="{ sex: null }">
            <label for="male">Gender</label>
            <fieldset class="mt-4 flex justify-center space-x-2">
                <label
                    class="ring-1 ring-gray-300 text-gray-800 px-5 py-3 rounded-full cursor-pointer hover:shadow-md"
                    :class="{ 'bg-blue-300': sex == 'm', 'bg-white': sex != 'm' }"
                >
                    <input wire:model.lazy="user.sex" x-model="sex" value="m" type="radio" class="hidden">
                    <i class="fa-solid fa-mars"></i>
                    <span>Male</span>
                </label>
                <label
                    class="ring-1 ring-gray-300 text-gray-800 px-5 py-3 rounded-full cursor-pointer hover:shadow-md"
                    :class="{ 'bg-pink-300': sex == 'f', 'bg-white': sex != 'f' }"
                >
                    <input wire:model.lazy="user.sex" x-model="sex" value="f" type="radio" class="hidden">
                    <i class="fa-solid fa-venus"></i>
                    <span>Female</span>
                </label>
            </fieldset>
            @error('user.sex')
                <div class="input-error-msg">{{ $message }}</div>
            @endError
        </div>
    </div>

    <div class="mt-8">
        <label for="dob_day">Birthday</label>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-x-2">
            <select
                wire:model.lazy="dob_day"
                id="dob_day"
                class="mt-2 block w-full"
            >
                <option selected>Day</option>
                @for($i=1; $i<=31; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <select
                wire:model.lazy="dob_month"
                class="mt-2 block w-full"
            >
                <option selected value="">Month</option>
                @foreach(range(1, 12) as $month)
                    <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                @endforeach
            </select>
            <select
                wire:model.lazy="dob_year"
                class="mt-2 block w-full"
            >
                <option selected>Year</option>
                @for($i=2010; $i>=1900; $i--)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div>
            @error('dob_day')
                <div class="input-error-msg">{{ $message }}</div>
            @enderror
            @error('dob_month')
                <div class="input-error-msg">{{ $message }}</div>
            @enderror
            @error('dob_year')
                <div class="input-error-msg">{{ $message }}</div>
            @enderror
        </div>
        @error('user.dob')
            <div class="input-error-msg">{{ $message }}</div>
        @endError
    </div>

    <button type="submit" class="mt-4 btn btn-primary">Save</button>
</form>