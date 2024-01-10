@section('title', 'Sign in to your account')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Sign in to your account
        </h2>
        @if (Route::has('register'))
            <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
                Or
                <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    create a new account
                </a>
            </p>
        @endif
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div>
            <form wire:submit.prevent="authenticate" class="form">
                <div>
                    <label for="email" class="form-label">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model="email" id="email" name="email" type="email" required autofocus class="appearance-none block w-full @error('email') form-input-error @enderror" />
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

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input wire:model="remember" id="remember" type="checkbox" class="form-checkbox w-4 h-4 text-primary-600 transition duration-150 ease-in-out" />
                        <label for="remember" class="block ml-2 text-sm text-gray-900 leading-5">
                            Remember
                        </label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}" class="font-medium text-primary-600 hover:text-primary-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full btn btn-secondary">
                            Sign in
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
