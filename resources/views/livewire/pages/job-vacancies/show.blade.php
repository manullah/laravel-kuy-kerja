<main class="py-10">
    <!-- Page header -->
    <div class="container px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:px-8">
        <div class="flex items-center space-x-5">
            <div class="flex-shrink-0">
                <div class="relative">
                    <img class="h-16 w-16 rounded-full object-cover"
                        src="{{ $jobVacancy->createdBy->profile_photo_url }}"
                        alt="{{ $jobVacancy->createdBy->name }}">
                    <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
                </div>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $jobVacancy->title }}</h1>
                <p class="text-sm font-medium text-gray-500">
                    {{ $jobVacancy->createdBy->name }} |
                    <time datetime="2020-08-25">{{ $jobVacancy->upload_date }}</time>
                </p>
            </div>
        </div>
    </div>

    <div
        class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
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

        <section aria-labelledby="apply-job" class="lg:col-start-3 lg:col-span-1">
            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <h2 id="apply-job" class="text-lg font-medium text-gray-900">Lamar lowongan</h2>

                <!-- Activity Feed -->
                <div class="mt-6 flow-root">
                    <x-jet-label for="security">
                        <p>Ketik "<span class="text-primary-600">{{ $securityWording }}</span>" untuk melamar
                            sekarang
                        </p>
                    </x-jet-label>
                    <x-jet-input id="security" type="text" class="mt-1 block w-full" placeholder="Saya ingin melamar"
                        wire:model="securityApply" />
                </div>
                <div class="mt-6 flex flex-col justify-stretch">
                    <button type="button" class="button primary" wire:click="applyNow" @if ($securityWording != $securityApply) disabled @endif>
                        Lamar Sekarang
                    </button>
                </div>

                @if (session()->has('success'))
                    <div
                        class="flex items-center justify-between p-4 mt-6 text-sm font-semibold text-primary-100 bg-green-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-primary">
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div
                        class="flex items-center justify-between p-4 mt-6 text-sm font-semibold text-white bg-red-400 rounded-lg shadow-md focus:outline-none">
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
            </div>
        </section>
    </div>
</main>
