<x-blank-layout>
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
                <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="/images/login-office.jpeg"
                    alt="Office" />
                <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                    src="/images/login-office-dark.jpeg" alt="Office" />
            </div>

            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <form method="POST" action="{{ route('login') }}" class="w-full">
                    @csrf

                    <h1 class="mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Login
                    </h1>

                    <div class="form-group">
                        <x-jet-label for="email" value="{{ __('Email') }}" class="label" />
                        <x-jet-input id="email" type="email" name="email" :value="old('email')" placeholder="Email..."
                            class="input" required autofocus />
                    </div>

                    <div class="form-group">
                        <x-jet-label for="password" value="{{ __('Password') }}" class="label" />
                        <x-jet-input id="password" type="password" name="password" autocomplete="current-password"
                            placeholder="Password..." class="input" required />
                    </div>

                    <div class="form-group">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" class="checkbox" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <button type="submit" class="button primary fluid">{{ __('Log in') }}</button>

                    <x-jet-validation-errors class="my-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <hr class="my-8" />

                    @if (Route::has('password.request'))
                        <p class="mt-4">
                            <a class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:underline"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </p>
                    @endif
                    @if (Route::has('register'))
                        <p class="mt-1">
                            <a class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:underline"
                                href="{{ route('register') }}">
                                Create account
                            </a>
                        </p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-blank-layout>
