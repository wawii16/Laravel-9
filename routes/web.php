<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Models\Brand;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('login_post', [AuthController::class, 'login_post']);

    Route::get('/regist', [AuthController::class, 'registration']);
    Route::post('registration_post', [AuthController::class, 'registration_post']);
});

Route::get('/', [ProfileController::class, 'show'])->name('home');



Route::get('logout', [AuthController::class, 'logout']);


Route::resource('brands', BrandController::class)->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
