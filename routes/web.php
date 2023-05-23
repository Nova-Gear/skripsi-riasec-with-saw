<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UkmController;
use App\Http\Controllers\Admin\EkstraController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\RiasecTestController;
use App\Http\Controllers\User\TestController;
use App\Http\Controllers\User\MahasiswaPrestasiController;
use App\Http\Controllers\User\MahasiswaEkstraController;
use App\Http\Controllers\RiasecController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::redirect('/home', '/user/home')->name('homea');
Route::resource('riasec', RiasecController::class)->names('riasec');


Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
    Route::resource('users', UserController::class)->names('users');
    Route::resource('roles', RoleController::class)->names('roles');
    Route::resource('ukm', UkmController::class)->names('ukm');
    Route::resource('ekstra', EkstraController::class)->names('ekstra');
    Route::resource('prestasi', PrestasiController::class)->names('prestasi');
    Route::resource('riasec_tests', RiasecTestController::class)->names('riasec_tests');
    Route::resource('kriteria', KriteriaController::class)->names('kriteria');

});

Route::middleware(['auth', 'role:Mahasiswa'])->prefix('user')->group(function () {
    Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
    Route::get('/test', [TestController::class, 'show'])->name('test');
    Route::post('/test', [TestController::class, 'submit'])->name('test.submit');
    Route::get('/test/result', [TestController::class, 'result'])->name('test.result');

    Route::get('/ukm', [App\Http\Controllers\User\UkmController::class, 'index'])->name('mahasiswa.ukm.index');
    Route::post('/ukm/choose', [App\Http\Controllers\User\UkmController::class, 'choose'])->name('mahasiswa.ukm.choose');
    Route::post('/ukm/remove', [App\Http\Controllers\User\UkmController::class, 'remove'])->name('mahasiswa.ukm.remove');

    Route::get('/ekstra', [MahasiswaEkstraController::class, 'index'])->name('mahasiswa.ekstra.index');
    Route::post('/ekstra/choose', [MahasiswaEkstraController::class, 'choose'])->name('mahasiswa.ekstra.choose');
    Route::post('/ekstra/remove', [MahasiswaEkstraController::class, 'remove'])->name('mahasiswa.ekstra.remove');

    Route::resource('/prestasi', MahasiswaPrestasiController::class)->names('mahasiswa.prestasi');
});