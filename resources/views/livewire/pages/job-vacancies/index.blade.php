<main>
    <section class="py-10 bg-gradient-to-r from-green-400 via-blue-500 to-indigo-500 ">
        <div class="container px-6">
            <div class="w-4/6 mx-auto">
                <h1 class="mb-4 text-2xl text-white">Cari Pekerjaanmu</h1>
                <div class="bg-white rounded-lg">
                    <div class="grid md:grid-cols-5 p-6 gap-x-6 gap-y-4">
                        <div class="col-span-4">
                            <div class="relative">
                                <input class="input" type="search" name="search" placeholder="Cari Pekerjaan.."
                                    style="padding-right: 2.5rem !important" wire:model="filters.search">
                                <button class="absolute right-0 top-0 bottom-0 mr-3">
                                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                                        y="0px" viewBox="0 0 56.966 56.966"
                                        style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                        width="512px" height="512px">
                                        <path
                                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <button class="button primary w-full" wire:click="saveFilter">
                                Cari
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-10">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <aside class="hidden md:block md:col-span-3">
                <div class="sticky top-32 space-y-4">
                    <section aria-labelledby="filter">
                        <div class="bg-white rounded-lg">
                            <div class="p-6">
                                <h3 id="filter">
                                    Filter
                                </h3>
                                <div class="mt-6 flow-root">
                                    <ul class="-mt-4 grid grid-cols-1 gap-y-4 divide-y divide-gray-200">
                                        <li>
                                            <h5 class="my-4">Jenis Pekerjaan</h5>
                                            @foreach ($typeOfWorks as $typeOfWork)
                                                <div class="flex my-2 text-sm">
                                                    <label class="flex items-center dark:text-gray-400">
                                                        <input type="checkbox" value="{{ $typeOfWork->id }}"
                                                            wire:model="filters.typeOfWorks" class="checkbox" />
                                                        <span class="ml-2">
                                                            {{ $typeOfWork->name }}
                                                        </span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </li>
                                        <li>
                                            <h5 class="my-4">Posisi Pekerjaan</h5>
                                            @foreach ($workExperiences as $workExperience)
                                                <div class="flex my-2 text-sm">
                                                    <label class="flex items-center dark:text-gray-400">
                                                        <input type="checkbox" value="{{ $workExperience->id }}"
                                                            wire:model="filters.workExperiences" class="checkbox" />
                                                        <span class="ml-2">
                                                            {{ $workExperience->name }}
                                                        </span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </li>
                                        <li>
                                            <h5 class="my-4">Posisi Pekerjaan</h5>
                                            @foreach ($jobPositions as $jobPosition)
                                                <div class="flex my-2 text-sm">
                                                    <label class="flex items-center dark:text-gray-400">
                                                        <input type="checkbox" value="{{ $jobPosition->id }}"
                                                            wire:model="filters.jobPositions" class="checkbox" />
                                                        <span class="ml-2">
                                                            {{ $jobPosition->name }}
                                                        </span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </li>
                                        <li>
                                            <h5 class="my-4">Wilayah</h5>
                                            <div class="form-group">
                                                <x-jet-label for="country" value="{{ __('Negara') }}" />
                                                <select id="country" class="mt-1 block w-full input"
                                                    wire:model="filters.country">
                                                    <option value="null" disabled selected>Choose</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <x-jet-label for="province" value="{{ __('Provinsi') }}" />
                                                <select id="province" class="mt-1 block w-full input"
                                                    wire:model="filters.province" @if (!$filters['country']) disabled @endif>
                                                    <option value="null" disabled selected>Choose</option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}">
                                                            {{ $province->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <x-jet-label for="city" value="{{ __('Kota') }}" />
                                                <select id="city" class="mt-1 block w-full input"
                                                    wire:model="filters.city" @if (!$filters['province']) disabled @endif>
                                                    <option value="null" disabled selected>Choose</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-6">
                                    <button
                                        class="w-full block text-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                                        wire:click="saveFilter">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </aside>

            <main class="md:col-span-9">
                <p class="mb-4">
                    Menampilkan {{ $jobVacancies->count() }} produk
                    {{ array_key_exists('search', $this->queryParams) ? 'untuk "' . $this->queryParams['search'] . '"' : '' }}
                    ({{ $jobVacancies->firstItem() }} - {{ $jobVacancies->lastItem() }} dari
                    {{ $jobVacancies->total() }})
                </p>

                {{-- <div class="flex flex-wrap gap-2 mb-4">
                    @foreach ($this->filtersActived as $value)
                        <button class="rounded-full bg-white px-4 py-1 focus:outline-none">
                            <p class="hover:text-black flex items-center">
                                <span class="mr-1">{{ $value->title }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </p>
                        </button>
                    @endforeach
                    <button class="focus:outline-none">
                        <p class="hover:text-primary-900 text-primary-400">Hapus semua</p>
                    </button>
                </div> --}}

                <div class="grid md:grid-cols-2 gap-4">
                    @foreach ($jobVacancies as $jobVacancy)
                        <div class="mb-4">
                            <ul class="space-y-4" x-data="{ showDescription: false }">
                                <li class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
                                    <article>
                                        <div class="mb-3">
                                            <div class="flex space-x-3">
                                                <div class="flex-shrink-0">
                                                    <img class="h-10 w-10 rounded-full object-cover"
                                                        src="{{ $jobVacancy->createdBy->profile_photo_url }}"
                                                        alt="{{ $jobVacancy->createdBy->name }}">
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <h5 class="font-medium">
                                                        <a href="#" class="hover:underline">
                                                            {{ $jobVacancy->createdBy->name }}
                                                        </a>
                                                    </h5>
                                                    <p class="text-sm text-gray-500">
                                                        <time
                                                            datetime="2020-12-09T11:43:00">{{ $jobVacancy->upload_date }}</time>
                                                    </p>
                                                </div>
                                            </div>
                                            <a href="{{ route('job-vacancies.show', $jobVacancy->slug) }}">
                                                <h3 class="mt-4 font-medium text-blue-500">
                                                    {{ $jobVacancy->title }}
                                                </h3>
                                            </a>
                                        </div>

                                        <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                                            <div>
                                                <dt class="text-sm font-medium text-gray-500">
                                                    Kota
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900">
                                                    {{ $jobVacancy->city->name }}
                                                </dd>
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
                                                    <div class="my-2 text-sm"
                                                        :class="{ 'max-h-description overflow-hidden' : !showDescription }">
                                                        {!! $jobVacancy->description !!}
                                                    </div>
                                                    <p x-show="!showDescription"
                                                        class="text-blue-500 cursor-pointer bg-white"
                                                        x-on:click="showDescription = !showDescription">
                                                        Baca selengkapnya
                                                    </p>
                                                    <p x-show="showDescription"
                                                        class="text-blue-500 cursor-pointer bg-white"
                                                        x-on:click="showDescription = !showDescription">
                                                        Baca lebih sedikit
                                                    </p>
                                                </dd>
                                            </div>
                                        </dl>

                                        <div class="mt-6 flex justify-between space-x-8">
                                            <div class="flex space-x-6">
                                                <span class="inline-flex items-center text-sm">
                                                    <button
                                                        class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                        <!-- Heroicon name: solid/eye -->
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            <path fill-rule="evenodd"
                                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span
                                                            class="font-medium text-gray-900">{{ $jobVacancy->userApplied->count() }}
                                                            orang
                                                            melamar</span>
                                                        <span class="sr-only">Applied</span>
                                                    </button>
                                                </span>
                                            </div>
                                            @if (Auth::user() && Auth::user()->isSearcher())
                                                <div class="flex text-sm">
                                                    <span class="inline-flex items-center text-sm">
                                                        <a href="{{ route('job-vacancies.show', $jobVacancy->slug) }}"
                                                            class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                            <span class="font-medium text-gray-900">Apply</span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                        </a>
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </article>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>
</main>
