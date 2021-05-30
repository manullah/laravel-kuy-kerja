<?php

use App\Http\Livewire\Pages\Admin\Index as AdminIndex;
use App\Http\Livewire\Pages\Admin\JobPositions as AdminJobPositions;
use App\Http\Livewire\Pages\Admin\JobVacancies as AdminJobVacancies;
use App\Http\Livewire\Pages\Admin\TypeOfWorks as AdminTypeOfWorks;
use App\Http\Livewire\Pages\Admin\WorkExperiences as AdminWorkExperiences;
use App\Http\Livewire\Pages\Index;
use App\Http\Livewire\Pages\JobVacancies\Index as JobVacanciesIndex;
use App\Http\Livewire\Pages\JobVacancies\Show as JobVacanciesShow;
use App\Http\Livewire\Pages\ManageJobVacanciesIndex;
use App\Http\Livewire\Pages\ManageJobVacanciesShow;
use App\Http\Livewire\Pages\Profile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Index::class)->name('index');

Route::get('/job-vacancies/', JobVacanciesIndex::class)->name('job-vacancies.index');
Route::get('/job-vacancies/{slug}', JobVacanciesShow::class)->name('job-vacancies.show');

Route::group(['middleware' => 'auth:sanctum', 'verified'], function() {
    Route::get('/profile', Profile::class)->name('profile.show');

    Route::group(['middleware' => 'role:recruiter'], function() {
        Route::get('/manage-job-vacancies', ManageJobVacanciesIndex::class)->name('manage-job-vacancies.index');
        Route::get('/manage-job-vacancies/{slug}', ManageJobVacanciesShow::class)->name('manage-job-vacancies.show');
    });

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('/', AdminIndex::class)->name('index');

        Route::get('/job-positions', AdminJobPositions::class)->name('job-positions.index');

        Route::get('/type-of-works', AdminTypeOfWorks::class)->name('type-of-works.index');

        Route::get('work-experiences', AdminWorkExperiences::class)->name('work-experiences.index');

        Route::get('job-vacancies', AdminJobVacancies::class)->name('job-vacancies.index');
    });
});
