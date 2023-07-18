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
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="register">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 leading-5">
                        Username
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="username" id="username" type="text" required autofocus class="appearance-none block w-full @error('username') form-input-error @enderror" />
                    </div>

                    @error('username')
                        <p class="input-error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" type="email" required class="appearance-none block w-full @error('email') form-input-error @enderror" />
                    </div>

                    @error('email')
                        <p class="input-error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required class="appearance-none block w-full @error('password') form-input-error @enderror" />
                    </div>

                    @error('password')
                        <p class="input-error-msg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 leading-5">
                        Confirm Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password" required class="appearance-none block w-full" />
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-sm font-medium text-gray-700 leading-5 text-center">I am registering as a ...</p>

                    <div class="mt-4 flex justify-around">
                        <div>
                            <label class="inline-flex items-center">
                                <input wire:model.lazy="accountType" type="radio" name="accountType" value="traveler">
                                <span class="ml-2">Traveler</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input wire:model.lazy="accountType" type="radio" name="accountType" value="host">
                                <span class="ml-2">Host</span>
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
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-md hover:bg-primary-500 focus:outline-none focus:border-primary-700 focus:ring-primary active:bg-primary-700 transition duration-150 ease-in-out">
                            Register
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
