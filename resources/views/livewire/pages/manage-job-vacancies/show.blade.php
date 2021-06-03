<main class="py-10">
    <!-- Page header -->
    <div class="container px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:px-8">
        <div class="flex items-center space-x-5">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $jobVacancy->title }}</h1>
                <p class="text-sm font-medium text-gray-500">
                    <time
                        datetime="2020-08-25">{{ $jobVacancy->created_at->isoFormat('dddd, MMMM Do YYYY, hh:mm a') }}</time>
                </p>
            </div>
        </div>
    </div>

    <div class="container mt-8 grid grid-cols-1 gap-6 lg:grid-flow-col-dense lg:grid-cols-3">
        <div class="space-y-6 lg:col-start-1 lg:col-span-2">
            <!-- Description list-->
            <section aria-labelledby="applicant-information-title">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">
                            Informasi Lowongan
                        </h2>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Informasi detail tentang lowongan pekerjaan.
                        </p>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <h4>Wilayah</h4>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">
                                    Negara
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $jobVacancy->country->name }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">
                                    Provinsi
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $jobVacancy->province->name }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">
                                    Kota
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $jobVacancy->city->name }}
                                </dd>
                            </div>

                            <div class="sm:col-span-2">
                                <h4>Informasi</h4>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">
                                    Jenis Pekerjaan
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $jobVacancy->typeofWork->name }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">
                                    Pengalaman Kerja
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $jobVacancy->workExperience->name }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">
                                    Posisi Pekerjaan
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $jobVacancy->jobPosition->name }}
                                </dd>
                            </div>
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">
                                    Deskripsi
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {!! $jobVacancy->description !!}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </section>
        </div>

        <section class="lg:col-start-1 lg:col-span-3">
            @if (session()->has('message'))
                <div
                    class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-green-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                    <span>{{ session('message') }}</span>
                </div>
            @endif

            <div class="table-wrapper">
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelamar</th>
                                <th>CV</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($userApplications as $key => $userApplication)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $userApplication->user->name }}</td>
                                    <td>
                                        <a href="{{ $userApplication->user->userDetail->searcher_cv_path }}"
                                            target="_blank">
                                            {{ $userApplication->user->userDetail->searcher_cv_path }}
                                        </a>
                                    </td>
                                    <td>{{ $userApplication->my_status }}</td>
                                    <td>
                                        <div class="flex items-center space-x-4 text-sm">
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-primary-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Edit"
                                                wire:click="triggerModalChangeStatus({{ $userApplication->id }})"
                                                title="Ubah Status Pelamar">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
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

                {{ $userApplications->links('components.pagination-links') }}
            </div>
        </section>
    </div>

    <x-jet-modal id="modal-change-status" wire:model="modalChangeStatus" maxWidth="lg">
        @if ($applicantActived)
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Ganti status pelamar "{{ $applicantActived->user->name }}"
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500 mb-3">
                            Apakah anda yakin untuk mengganti status pelamar?
                        </p>
                        <select class="input" wire:model="state.status">
                            @foreach ($this->optionsStatusJobVacancy as $value)
                                <option value="{{ $value->name }}">
                                    {{ $value->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="button primary" wire:click="changeStatusApplicant">
                    Save
                </button>
            </div>
        @endif
    </x-jet-modal>
</main>
