<?php

use App\Http\Livewire\Pages\Admin\Index as AdminIndex;
use App\Http\Livewire\Pages\Admin\JobPositions as AdminJobPositions;
use App\Http\Livewire\Pages\Admin\JobVacancies as AdminJobVacancies;
use App\Http\Livewire\Pages\Admin\TypeOfWorks as AdminTypeOfWorks;
use App\Http\Livewire\Pages\Admin\WorkExperiences as AdminWorkExperiences;
use App\Http\Livewire\Pages\Index;
use Illuminate\Http\Request;
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

Route::group(['middleware' => 'auth:sanctum', 'verified'], function() {
    Route::get('/profile', function (Request $request) {
        return view('pages.profile', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    })->name('profile.show');

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('/', AdminIndex::class)->name('index');

        Route::get('/job-positions', AdminJobPositions::class)->name('job-positions.index');

        Route::get('/type-of-works', AdminTypeOfWorks::class)->name('type-of-works.index');

        Route::get('work-experiences', AdminWorkExperiences::class)->name('work-experiences.index');

        Route::get('job-vacancies', AdminJobVacancies::class)->name('job-vacancies.index');
    });
});
