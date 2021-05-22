<?php

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\JobPositionController as AdminJobPositionController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' => 'auth:sanctum', 'verified'], function() {
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('/', [AdminIndexController::class, 'index'])->name('index');
        Route::resource('/job-positions', AdminJobPositionController::class);
    });
});
