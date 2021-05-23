<div class="container px-6 mx-auto grid">
    <h1 class="my-6">Job Position</h1>

    @if (session()->has('message'))
        <div
            class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-green-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
            <span>{{ session('message') }}</span>
        </div>
    @endif

    <div class="grid gap-6 md:grid-cols-2 mb-6">
        {{-- Manage Job Position --}}
        <div>
            <h4 class="mb-4 ">Manage Job Position</h4>

            <form @if ($isStore) wire:submit.prevent="storeJP" @else wire:submit.prevent="updateJP" @endif class="card">
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
                                <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox" wire:model="isStore" wire:click.prevent="changeFormAction" />
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

    <div class="table-wrapper">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobPositions as $key => $jobPosition)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                {{ $jobPosition->name }}
                            </td>
                            <td>
                                <div class="flex items-center space-x-4 text-sm">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-primary-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" wire:click.prevent="showJP({{ $jobPosition->id }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-primary-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete" wire:click.prevent="destroyJP({{ $jobPosition->id }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $jobPositions->links('components.pagination-links') }}
    </div>
</div>
