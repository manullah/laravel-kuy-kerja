<div class="container px-6 mx-auto grid">
    <h1 class="my-6">Job Vacancies</h1>

    @if (session()->has('message'))
        <div
            class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-green-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
            <span>{{ session('message') }}</span>
        </div>
    @endif

    <div class="grid gap-6 md:grid-cols-2 mb-6">
        {{-- Manage Job Vacancies --}}
        <div>
            <h4 class="mb-4 ">Manage Job Vacancies</h4>

            <form @if ($isStore) wire:submit.prevent="storeTOW" @else wire:submit.prevent="updateTOW" @endif class="card">
                <div class="card-body">
                    <div class="form-group">
                        <x-jet-label for="name" value="{{ __('Name') }}" class="label" />
                        <x-jet-input id="name" type="text" name="name" wire:model="state.name" placeholder="Name..." />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>
                </div>
                <div class="card-footer flex justify-between items-center">
                    <span>
                        @if (!$isStore)
                            <div>
                                <div class="switch">
                                    <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox"
                                        wire:model="isStore" wire:click.prevent="changeFormAction" />
                                    <label for="toggle" class="toggle-label"></label>
                                </div>
                                <label for="toggle" class="text-xs text-gray-700">Change to create form.</label>
                            </div>
                        @endif
                    </span>

                    <button type="submit" class="button primary">Save</button>
                </div>
            </form>
        </div>

        <div>
            <h4 class="mb-4 ">Filters</h4>

            <div class="card">
                <div class="card-body">
                    <x-jet-input type="text" wire:model="search" placeholder="Search..." />
                </div>
            </div>
        </div>
    </div>
</div>
