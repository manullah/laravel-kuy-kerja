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
                        <div for="name" class="label">{{ __('Name') }}</div>
                        <input id="name" type="text" name="name" wire:model="name" class="form-control"
                            placeholder="Name..." required />
                    </label>

                    <label class="form-group">
                        <div for="email" class="label">{{ __('Email') }}</div>
                        <input id="email" type="email" name="email" wire:model="email" class="form-control"
                            placeholder="Email..." required />
                    </label>

                    <label class="form-group">
                        <div for="role_id" class="label">{{ __('Register as') }}</div>
                        <select name="role_id" x-model="role_id" class="select" required>
                            <option value="2">Recruiter</option>
                            <option value="3">Searcher</option>
                        </select>
                    </label>

                    <label class="form-group">
                        <div for="password" class="label">{{ __('Password') }}</div>
                        <input id="password" type="password" name="password" class="form-control"
                            placeholder="Password..." autocomplete="new-password" required />
                    </label>

                    <label class="form-group">
                        <div for="password_confirmation" class="label">{{ __('Confirm Password') }}</div>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            class="form-control" placeholder="Password..." autocomplete="new-password" required />
                    </label>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="form-group">
                            <label class="flex items-center dark:text-gray-400">
                                <input id="terms" type="checkbox" name="terms" class="checkbox" />
                                <span class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline">' . __('Privacy Policy') . '</a>',
]) !!}
                                </span>
                            </label>
                        </div>
                    @endif

                    <button type="submit" class="button primary fluid">Create account</button>

                    <x-jet-validation-errors class="my-4" />

                    <hr class="my-8" />

                    @if (Route::has('login'))
                        <p>
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
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
