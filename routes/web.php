<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\AuthController;
use App\Models\Brand;
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
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login_post', [AuthController::class, 'login_post']);

Route::get('/regist', [AuthController::class, 'registration']);
Route::post('registration_post', [AuthController::class, 'registration_post']);

Route::get('logout', [AuthController::class, 'logout']);

// Route::middleware('auth')->prefix('/profile')->group(function () {

//     Route::put('/{id}', [ProfileController::class, 'update'])->name('profile.update');
//     Route::get('/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
// });

// Route::middleware('auth')->prefix('/admin')->group(function () {
//     Route::get('/', [BrandController::class, 'create'])->middleware('auth');

//     Route::post('/add_brand', [BrandController::class, 'store'])->name('brand.add');

//     Route::put('/add_brand/{id}', [BrandController::class, 'update'])->name('brand.update');
//     Route::get('/add_brand/{id}', [BrandController::class, 'edit'])->name('admin.edit_berita');

//     Route::delete('/add_brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
// });

Route::resource('brands', BrandController::class)->middleware('auth');
