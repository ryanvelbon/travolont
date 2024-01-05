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
                <input type="file" wire:model.live="avatar">
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
                <input wire:model="firstName" id="firstName" type="text" class="w-full @error('firstName') form-input-error @endError">
                @error('firstName')
                    <div class="input-error-msg">{{ $message }}</div>
                @endError
            </div>
        </div>

        <div>
            <label for="lastName">Last Name</label>

            <div>
                <input wire:model="lastName" id="lastName" type="text" class="w-full @error('lastName') form-input-error @endError">
                @error('lastName')
                    <div class="input-error-msg">{{ $message }}</div>
                @endError
            </div>
        </div>

        <div>
            <label for="nationality">Nationality</label>
            <select
                wire:model="nationalityId"
                id="nationality"
                class="mt-2 block w-full"
            >
                <option selected>your country of birth</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}">{{ $country->name }}</option>
                @endforeach
            </select>
            @error('nationalityId')
                <div class="input-error-msg">{{ $message }}</div>
            @endError
        </div>

        <div x-data="{ sex: @entangle('sex') }">
            <label for="male">Gender</label>
            <fieldset class="mt-4 flex justify-center space-x-2">
                <label
                    class="radio-btn rounded-xl px-5 py-3"
                    :class="sex == 'm' ? 'bg-secondary-300' : 'bg-white'"
                >
                    <input wire:model="sex" x-model="sex" value="m" type="radio" class="hidden">
                    <i class="fa-solid fa-mars"></i>
                    <span>Male</span>
                </label>
                <label
                    class="radio-btn rounded-xl px-5 py-3"
                    :class="sex == 'f' ? 'bg-secondary-300' : 'bg-white'"
                >
                    <input wire:model="sex" x-model="sex" value="f" type="radio" class="hidden">
                    <i class="fa-solid fa-venus"></i>
                    <span>Female</span>
                </label>
            </fieldset>
            @error('sex')
                <div class="input-error-msg">{{ $message }}</div>
            @endError
        </div>
    </div>

    <div class="mt-8">
        <label for="dob_day">Birthday</label>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-x-2">
            <select
                wire:model="dobDay"
                id="dob_day"
                class="mt-2 block w-full"
            >
                <option selected>Day</option>
                @for($i=1; $i<=31; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            <select
                wire:model="dobMonth"
                class="mt-2 block w-full"
            >
                <option selected value="">Month</option>
                @foreach(range(1, 12) as $month)
                    <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                @endforeach
            </select>
            <select
                wire:model="dobYear"
                class="mt-2 block w-full"
            >
                <option selected>Year</option>
                @for($i=2010; $i>=1900; $i--)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div>
            @error('dobDay')
                <div class="input-error-msg">{{ $message }}</div>
            @enderror
            @error('dobMonth')
                <div class="input-error-msg">{{ $message }}</div>
            @enderror
            @error('dobYear')
                <div class="input-error-msg">{{ $message }}</div>
            @enderror
        </div>
        @error('dob')
            <div class="input-error-msg">{{ $message }}</div>
        @endError
    </div>

    <button type="submit" class="mt-4 btn btn-primary">Save</button>
</form>