<div class="container py-8">
    <h1 class="mb-6">Kelola Lowongan Kerja</h1>

    @if (session()->has('message'))
        <div
            class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-green-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
            <span>{{ session('message') }}</span>
        </div>
    @endif

    <div class="grid gap-6 grid-cols-1 mb-6">
        {{-- Manage Job Vacancies --}}
        <div>
            <form @if ($isStore) wire:submit.prevent="triggerStore" @else wire:submit.prevent="triggerUpdate" @endif class="card">
                <div class="card-body">

                    <h3 class="mb-4">Wilayah</h3>
                    <div class="grid gap-6 gap-y-0 grid-cols-1 md:grid-cols-2 mb-2">
                        <div class="form-group">
                            <x-jet-label for="country" value="{{ __('Negara') }}" />
                            <select id="country" class="mt-1 block w-full input" wire:model="state.country">
                                <option value="null" disabled selected>Choose</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->value }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="country" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <x-jet-label for="province" value="{{ __('Provinsi') }}" />
                            <select id="province" class="mt-1 block w-full input" wire:model="state.province">
                                <option value="null" disabled selected>Choose</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->value }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="province" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <x-jet-label for="city" value="{{ __('Kota') }}" />
                            <select id="city" class="mt-1 block w-full input" wire:model="state.city">
                                <option value="null" disabled selected>Choose</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->value }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="city" class="mt-2" />
                        </div>
                    </div>

                    <h3 class="mb-4">Informasi</h3>
                    <div class="grid gap-6 gap-y-0 grid-cols-1 md:grid-cols-2">
                        <div class="md:col-span-2">
                            <div class="form-group">
                                <x-jet-label for="title" value="{{ __('Judul') }}" class="label" />
                                <x-jet-input id="title" type="text" wire:model.defer="state.title" autocomplete="name"
                                    placeholder="Judul..." />
                                <x-jet-input-error for="title" class="mt-2" />
                            </div>
                        </div>

                        <div class="form-group">
                            <x-jet-label for="type_of_work" value="{{ __('Jenis Pekerjaan') }}" class="label" />
                            @livewire('components.search-dropdown.dropdown-type-of-work')
                            <x-jet-input-error for="type_of_work" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <x-jet-label for="work_experience" value="{{ __('Pengalaman Kerja') }}" class="label" />
                            @livewire('components.search-dropdown.dropdown-work-experience')
                            <x-jet-input-error for="work_experience" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <x-jet-label for="job_position" value="{{ __('Tingkat Pekerjaan') }}" class="label" />
                            @livewire('components.search-dropdown.dropdown-job-position')
                            <x-jet-input-error for="job_position" class="mt-2" />
                        </div>

                        <div class="md:col-span-2">
                            <div class="form-group">
                                <x-jet-label for="description" value="{{ __('Deskripsi') }}" class="label" />
                                <div wire:ignore>
                                    <textarea name="description" class="description"
                                        wire:model="state.description"></textarea>
                                </div>
                                <x-jet-input-error for="description" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    @error('slug')
                        <p class="invalid-feedback">Lowongan ini telah dibuat</p>
                    @enderror
                </div>
                <div class="card-footer flex justify-between items-center">
                    <span>
                        @if (!$isStore)
                            <div>
                                <div class="switch">
                                    <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox"
                                        wire:model="isStore" />
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

        <div class="w-1/2">
            <h4 class="mb-4 ">Filters</h4>

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <x-jet-label for="search" value="{{ __('Search') }}" class="label" />
                        <x-jet-input type="text" id="search" wire:model="search" placeholder="Search..." />
                    </div>
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
                        <th>Judul</th>
                        <th>Kota</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobVacancies as $key => $jobVacancy)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                {{ $jobVacancy->title }}
                            </td>
                            <td>{{ $jobVacancy->city->name }}</td>
                            <td>{{ $jobVacancy->typeOfWork->name }}</td>
                            <td>
                                <div class="flex items-center space-x-4 text-sm">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-primary-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" wire:click.prevent="triggerShow('{{ $jobVacancy->slug }}')"
                                        title="Ubah">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-500 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete"
                                        wire:click.prevent="triggerDestroy('{{ $jobVacancy->slug }}')" title="Hapus">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-500 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit"
                                        href="{{ route('manage-job-vacancies.show', $jobVacancy->slug) }}"
                                        title="Detail">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Data Kosong.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $jobVacancies->links('components.pagination-links') }}
    </div>
</div>

@section('scripts')
    <script>
        function tinymCeInit() {
            tinymce.init({
                selector: 'textarea.description',
                height: 500,
                setup: function(editor) {
                    editor.on('init change', function() {
                        editor.save();
                    });
                    editor.on('change', function(e) {
                        @this.set('state.description', editor.getContent());
                    });
                },
            });
        }

        document.addEventListener('livewire:update', function() {
            tinymCeInit();
        })

        window.addEventListener('dispatchTinymCe', event => {
            tinymce.activeEditor.setContent(event.detail);
        })

        tinymCeInit()

    </script>
@stop
