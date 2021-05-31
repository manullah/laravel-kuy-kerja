<main>
    <section class="py-10 mb-8 bg-gradient-to-r from-green-400 via-blue-500 to-indigo-500 ">
        <div class="container px-6">
            <h1 class="mb-4 text-2xl text-white">Cari Pekerjaanmu</h1>
            <div class="bg-white rounded-lg shadow">
                <div class="grid md:grid-cols-7 p-6 gap-x-6 gap-y-4">
                    <div class="col-span-2">
                        <div class="relative">
                            <input class="input" type="search" name="search" placeholder="Cari Pekerjaan.."
                                style="padding-right: 2.5rem !important" wire:model="search">
                            <button class="absolute right-0 top-0 bottom-0 mr-3">
                                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                    xml:space="preserve" width="512px" height="512px">
                                    <path
                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-span-2">
                        @livewire('components.search-dropdown.dropdown-city')
                    </div>
                    <div class="col-span-2">
                        @livewire('components.search-dropdown.dropdown-type-of-work')
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <button class="button primary w-full">
                            Cari
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mx-auto w-64 md:w-96 py-20 text-center">
        <img src="/images/illustrations/under_construction.svg" alt="" class="w-full mb-6">
        <h2 class="">This page is under construction</h2>
    </div>

    {{-- <div class="container">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <aside class="hidden lg:block lg:col-span-4">
                <div class="sticky top-32 space-y-4">
                    <section aria-labelledby="who-to-follow-heading">
                        <div class="bg-white rounded-lg shadow">
                            <div class="p-6">
                                <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">
                                    Who to follow
                                </h2>
                                <div class="mt-6 flow-root">
                                    <ul class="-my-4 divide-y divide-gray-200">
                                        <li class="flex items-center py-4 space-x-3">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=oemKFEZcOL&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                    alt="">
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <p class="text-sm font-medium text-gray-900">
                                                    <a href="#">Leonard Krasner</a>
                                                </p>
                                                <p class="text-sm text-gray-500">
                                                    <a href="#">@leonardkrasner</a>
                                                </p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button type="button"
                                                    class="inline-flex items-center px-3 py-0.5 rounded-full bg-rose-50 text-sm font-medium text-rose-700 hover:bg-rose-100">
                                                    <!-- Heroicon name: solid/plus -->
                                                    <svg class="-ml-1 mr-0.5 h-5 w-5 text-rose-400"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <span>
                                                        Follow
                                                    </span>
                                                </button>
                                            </div>
                                        </li>

                                        <!-- More people... -->
                                    </ul>
                                </div>
                                <div class="mt-6">
                                    <a href="#"
                                        class="w-full block text-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        View all
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section aria-labelledby="trending-heading">
                        <div class="bg-white rounded-lg shadow">
                            <div class="p-6">
                                <h2 id="trending-heading" class="text-base font-medium text-gray-900">
                                    Trending
                                </h2>
                                <div class="mt-6 flow-root">
                                    <ul class="-my-4 divide-y divide-gray-200">
                                        <li class="flex py-4 space-x-3">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixqx=oemKFEZcOL&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                    alt="Floyd Miles">
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <p class="text-sm text-gray-800">What books do you have on your
                                                    bookshelf
                                                    just to look smarter than you actually are?</p>
                                                <div class="mt-2 flex">
                                                    <span class="inline-flex items-center text-sm">
                                                        <button
                                                            class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                            <!-- Heroicon name: solid/chat-alt -->
                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            <span class="font-medium text-gray-900">291</span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- More posts... -->
                                    </ul>
                                </div>
                                <div class="mt-6">
                                    <a href="#"
                                        class="w-full block text-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        View all
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </aside>
            <main class="lg:col-span-8">
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
                                        <a href="#">
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
                                                <button class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
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
            </main>
        </div>
    </div> --}}
</main>
