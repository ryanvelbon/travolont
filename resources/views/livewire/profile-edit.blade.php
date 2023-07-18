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
                    <div class="input-error-msg">{{ $message }}</div>
                @endError
            </div>
        </div>

        <div>
            <label for="lastName">Last Name</label>

            <div>
                <input wire:model.lazy="user.last_name" id="lastName" type="text">
                @error('user.last_name')
                    <div class="input-error-msg">{{ $message }}</div>
                @endError
            </div>
        </div>

        <div>
            <label for="nationality" class="block text-sm font-medium leading-6 text-gray-900">Nationality</label>
            <select
                wire:model.lazy="user.nationality"
                id="nationality"
                class="form-select mt-2 block w-full"
            >
                <option selected>-- select --</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}">{{ $country->name }}</option>
                @endforeach
            </select>
            @error('user.nationality')
                <div class="input-error-msg">{{ $message }}</div>
            @endError
        </div>

        <div>
            <label class="text-base font-semibold text-gray-900">Gender</label>
            <fieldset class="mt-4">
            <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
              <div class="flex items-center">
                <input wire:model.lazy="user.sex" value="m" id="male" type="radio" checked class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                <label for="male" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Male</label>
              </div>
              <div class="flex items-center">
                <input wire:model.lazy="user.sex" value="f" id="female" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                <label for="female" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Female</label>
              </div>
            </div>
            </fieldset>
            @error('user.sex')
                <div class="input-error-msg">{{ $message }}</div>
            @endError
        </div>

        <div class="col-span-2">
            <label for="dob_day" class="block text-sm font-medium leading-6 text-gray-900">Birthday</label>
            <div class="grid grid-cols-3 gap-2">
                <select
                    wire:model.lazy="dob_day"
                    id="dob_day"
                    class="form-select mt-2 block w-full"
                >
                    <option selected>Day</option>
                    @for($i=1; $i<=31; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <select
                    wire:model.lazy="dob_month"
                    class="form-select mt-2 block w-full"
                >
                    <option selected value="">Month</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                    @endforeach
                </select>
                <select
                    wire:model.lazy="dob_year"
                    class="form-select mt-2 block w-full"
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
    </div>

    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2">Save</button>
</form>