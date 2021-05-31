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

            <!-- Comments-->
            <section aria-labelledby="notes-title">
                <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
                    <div class="divide-y divide-gray-200">
                        <div class="px-4 py-5 sm:px-6">
                            <h2 id="notes-title" class="text-lg font-medium text-gray-900">Notes</h2>
                        </div>
                        <div class="px-4 py-6 sm:px-6">
                            <ul class="space-y-8">
                                <li>
                                    <div class="flex space-x-3">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full"
                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixqx=oemKFEZcOL&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt="">
                                        </div>
                                        <div>
                                            <div class="text-sm">
                                                <a href="#" class="font-medium text-gray-900">Leslie Alexander</a>
                                            </div>
                                            <div class="mt-1 text-sm text-gray-700">
                                                <p>Ducimus quas delectus ad maxime totam doloribus reiciendis ex.
                                                    Tempore dolorem maiores. Similique voluptatibus tempore non ut.</p>
                                            </div>
                                            <div class="mt-2 text-sm space-x-2">
                                                <span class="text-gray-500 font-medium">4d ago</span>
                                                <span class="text-gray-500 font-medium">&middot;</span>
                                                <button type="button" class="text-gray-900 font-medium">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="flex space-x-3">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full"
                                                src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixqx=oemKFEZcOL&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt="">
                                        </div>
                                        <div>
                                            <div class="text-sm">
                                                <a href="#" class="font-medium text-gray-900">Michael Foster</a>
                                            </div>
                                            <div class="mt-1 text-sm text-gray-700">
                                                <p>Et ut autem. Voluptatem eum dolores sint necessitatibus quos. Quis
                                                    eum qui dolorem accusantium voluptas voluptatem ipsum. Quo facere
                                                    iusto quia accusamus veniam id explicabo et aut.</p>
                                            </div>
                                            <div class="mt-2 text-sm space-x-2">
                                                <span class="text-gray-500 font-medium">4d ago</span>
                                                <span class="text-gray-500 font-medium">&middot;</span>
                                                <button type="button" class="text-gray-900 font-medium">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="flex space-x-3">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full"
                                                src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=oemKFEZcOL&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt="">
                                        </div>
                                        <div>
                                            <div class="text-sm">
                                                <a href="#" class="font-medium text-gray-900">Dries Vincent</a>
                                            </div>
                                            <div class="mt-1 text-sm text-gray-700">
                                                <p>Expedita consequatur sit ea voluptas quo ipsam recusandae. Ab sint et
                                                    voluptatem repudiandae voluptatem et eveniet. Nihil quas consequatur
                                                    autem. Perferendis rerum et.</p>
                                            </div>
                                            <div class="mt-2 text-sm space-x-2">
                                                <span class="text-gray-500 font-medium">4d ago</span>
                                                <span class="text-gray-500 font-medium">&middot;</span>
                                                <button type="button" class="text-gray-900 font-medium">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-6 sm:px-6">
                        <div class="flex space-x-3">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80"
                                    alt="">
                            </div>
                            <div class="min-w-0 flex-1">
                                <form action="#">
                                    <div>
                                        <label for="comment" class="sr-only">About</label>
                                        <textarea id="comment" name="comment" rows="3"
                                            class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
                                            placeholder="Add a note"></textarea>
                                    </div>
                                    <div class="mt-3 flex items-center justify-between">
                                        <a href="#"
                                            class="group inline-flex items-start text-sm space-x-2 text-gray-500 hover:text-gray-900">
                                            <!-- Heroicon name: solid/question-mark-circle -->
                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>
                                                Some HTML is okay.
                                            </span>
                                        </a>
                                        <button type="submit"
                                            class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Comment
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Timeline</h2>

                <!-- Activity Feed -->
                <div class="mt-6 flow-root">
                    <ul class="-mb-8">
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                    aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                            <!-- Heroicon name: solid/user -->
                                            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Applied to <a href="#"
                                                    class="font-medium text-gray-900">Front End Developer</a></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="2020-09-20">Sep 20</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                    aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                            <!-- Heroicon name: solid/thumb-up -->
                                            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Advanced to phone screening by <a href="#"
                                                    class="font-medium text-gray-900">Bethany Blake</a></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="2020-09-22">Sep 22</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                    aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Completed phone screening with <a href="#"
                                                    class="font-medium text-gray-900">Martha Gardner</a></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="2020-09-28">Sep 28</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                    aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                            <!-- Heroicon name: solid/thumb-up -->
                                            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Advanced to interview by <a href="#"
                                                    class="font-medium text-gray-900">Bethany Blake</a></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="2020-09-30">Sep 30</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="relative pb-8">
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Completed interview with <a href="#"
                                                    class="font-medium text-gray-900">Katherine Snyder</a></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="2020-10-04">Oct 4</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mt-6 flex flex-col justify-stretch">
                    <button type="button"
                        class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Advance to offer
                    </button>
                </div>
            </div>
        </section>
    </div>
</main>
