<?php

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

Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::group(['middleware' => 'auth:sanctum', 'verified'], function() {
    Route::get('/profile', function (Request $request) {
        return view('pages.profile', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    })->name('profile.show');

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('/', function () {
            return view('pages.admin.index');
        })->name('index');

        Route::get('/job-positions', function () {
            return view('pages.admin.job-positions');
        })->name('job-positions.index');

        Route::get('/type-of-works', function () {
            return view('pages.admin.type-of-works');
        })->name('type-of-works.index');

        Route::get('work-experiences', function () {
            return view('pages.admin.work-experiences');
        })->name('work-experiences.index');

        Route::get('job-vacancies', function () {
            return view('pages.admin.job-vacancies');
        })->name('job-vacancies.index');
    });
});
