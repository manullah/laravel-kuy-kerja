<div class="container py-8">
    <section aria-labelledby="applicant-information-title">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h2 id="applicant-information-title">
                    {{ $jobVacancy->title }}
                </h2>
                <p class="mt-1 max-w-2xl text-sm">
                    {{ Auth::user()->name }}
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
