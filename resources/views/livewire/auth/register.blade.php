@section('title', 'Create a new account')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Create a new account
        </h2>

        <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
            Or
            <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:text-primary-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                sign in to your account
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div>
            <form wire:submit.prevent="register" class="form">
                <div>
                    <label for="username" class="form-label">
                        Username
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model="username" id="username" type="text" required autofocus class="appearance-none block w-full @error('username') form-input-error @enderror" />
                    </div>

                    @error('username')
                        <p class="input-error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="email" class="form-label">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model="email" id="email" type="email" required class="appearance-none block w-full @error('email') form-input-error @enderror" />
                    </div>

                    @error('email')
                        <p class="input-error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="form-label">
                        Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model="password" id="password" type="password" required class="appearance-none block w-full @error('password') form-input-error @enderror" />
                    </div>

                    @error('password')
                        <p class="input-error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="form-label">
                        Confirm Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model="passwordConfirmation" id="password_confirmation" type="password" required class="appearance-none block w-full" />
                    </div>
                </div>

                <div x-data="{ accountType: null }" class="mt-6">
                    <div class="mt-4 flex justify-around">
                        <div>
                            <label
                                class="inline-flex items-center px-8 py-4 rounded-xl radio-btn"
                                :class="{'bg-primary-500 text-white': accountType == 'traveler', 'bg-gray-100 hover:bg-gray-200': accountType != 'traveler'}"
                            >
                                <input wire:model="accountType" x-model="accountType" type="radio" value="traveler" class="hidden">
                                <i class="fa-regular fa-backpack"></i>
                                <span class="ml-2 text-sm font-medium">I am a Traveler</span>
                            </label>
                        </div>
                        <div>
                            <label
                                class="inline-flex items-center px-8 py-4 rounded-xl radio-btn"
                                :class="{'bg-primary-500 text-white': accountType == 'host', 'bg-gray-100 hover:bg-gray-200': accountType != 'host'}"
                            >
                                <input wire:model="accountType" x-model="accountType" type="radio" value="host" class="hidden">
                                <i class="fa-regular fa-house-night"></i>
                                <span class="ml-2 text-sm font-medium">I am a Host</span>
                            </label>
                        </div>
                    </div>

                    @error('accountType')
                        <p class="input-error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <div></div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full btn btn-secondary">
                            Register
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
