<div class="container py-10">
    <div class="table-wrapper">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Perusahaan</th>
                        <th>Pekerjaan</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Kota</th>
                        <th>status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($myJobApplications as $key => $myJobApplication)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $myJobApplication->jobVacancy->createdBy->name }}</td>
                            <td>
                                <a href="{{ route('job-vacancies.show', $myJobApplication->jobVacancy->slug) }}"
                                    class="text-blue-600 underline">
                                    {{ $myJobApplication->jobVacancy->title }}
                                </a>
                            </td>
                            <td>{{ $myJobApplication->jobVacancy->typeOfWork->name }}</td>
                            <td>{{ $myJobApplication->jobVacancy->city->name }}</td>
                            <td>{{ $myJobApplication->myStatus }}</td>
                            <td>
                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-500 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete"
                                    wire:click.prevent="triggerDestroy({{ $myJobApplication->id }})" title="Hapus">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Data Kosong.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $myJobApplications->links('components.pagination-links') }}
    </div>
</div>
