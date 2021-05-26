<x-blank-layout>
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
                <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                    src="/images/create-account-office.jpeg" alt="Office" />
                <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                    src="/images/img/create-account-office-dark.jpeg" alt="Office" />
            </div>

            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <form method="POST" action="{{ route('register') }}" class="w-full">
                    @csrf

                    <h1 class="mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Create Account
                    </h1>

                    <label class="form-group">
                        <div for="role_id" class="label">{{ __('Register as') }}</div>
                        <select name="role_id" class="select" required>
                            <option value="2" @if (old('role_id') == 2) selected @endif>Searcher</option>
                            <option value="3" @if (old('role_id') == 3) selected @endif>Recruiter</option>
                        </select>
                    </label>

                    <div class="form-group">
                        <x-jet-label for="name" value="{{ __('Full Name') }}" class="label" />
                        <x-jet-input id="name" type="text" name="name" :value="old('name')" placeholder="Name..."
                            class="input" required autofocus autocomplete="name" />
                    </div>

                    <div class="form-group">
                        <x-jet-label for="email" value="{{ __('Email') }}" class="label" />
                        <x-jet-input id="email" type="email" name="email" :value="old('email')" placeholder="Email..."
                            class="input" required />
                    </div>

                    <div class="form-group">
                        <x-jet-label for="password" value="{{ __('Password') }}" class="label" />
                        <x-jet-input id="password" type="password" name="password" autocomplete="new-password"
                            placeholder="Password..." class="input" required />
                    </div>

                    <div class="form-group">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="label" />
                        <x-jet-input id="password_confirmation" type="password" name="password_confirmation"
                            autocomplete="new-password" placeholder="Confirm Password..." class="input" required />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="form-group">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms" class="checkbox" />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:underline">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:underline">' . __('Privacy Policy') . '</a>',
]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif

                    <button type="submit" class="button primary fluid">Create account</button>

                    <x-jet-validation-errors class="my-4" />

                    <hr class="my-8" />

                    @if (Route::has('login'))
                        <p>
                            <a class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:underline"
                                href="{{ route('login') }}">
                                Already have an account? Login
                            </a>
                        </p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-blank-layout>
