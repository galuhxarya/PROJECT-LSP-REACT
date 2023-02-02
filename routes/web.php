<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MengajarController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;

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

Route::post('/login/admin', [IndexController::class, 'loginAdmin']);
Route::post('/login/siswa', [IndexController::class, 'loginSiswa']);
Route::post('/login/guru', [IndexController::class, 'loginGuru']);
Route::get('/', [IndexController::class, 'index']);
Route::get('/home', [IndexController::class, 'welcome']);
Route::get('/logout', [IndexController::class, 'logout']);

Route::prefix('/guru')->group(function(){
    Route::get('/index', [GuruController::class, 'index']);
    Route::get('/create', [GuruController::class, 'create']);
    Route::get('/edit/{guru}', [GuruController::class, 'edit']);
    Route::get('/destroy/{guru}', [GuruController::class, 'destroy']);
    Route::post('/store', [GuruController::class, 'store']);
    Route::post('/update/{guru}', [GuruController::class, 'update']);
});

Route::prefix('/jurusan')->group(function(){
    Route::get('/index', [JurusanController::class, 'index']);
    Route::get('/create', [JurusanController::class, 'create']);
    Route::get('/edit/{jurusan}', [JurusanController::class, 'edit']);
    Route::get('/destroy/{jurusan}', [JurusanController::class, 'destroy']);
    Route::post('/store', [JurusanController::class, 'store']);
    Route::post('/update/{jurusan}', [JurusanController::class, 'update']);
});

Route::prefix('/mapel')->group(function(){
    Route::get('/index', [MapelController::class, 'index']);
    Route::get('/create', [MapelController::class, 'create']);
    Route::get('/edit/{mapel}', [MapelController::class, 'edit']);
    Route::get('/destroy/{mapel}', [MapelController::class, 'destroy']);
    Route::post('/store', [MapelController::class, 'store']);
    Route::post('/update/{mapel}', [MapelController::class, 'update']);
});

Route::prefix('/kelas')->group(function(){
    Route::get('/index', [KelasController::class, 'index']);
    Route::get('/create', [KelasController::class, 'create']);
    Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
    Route::get('/destroy/{kelas}', [KelasController::class, 'destroy']);
    Route::post('/store', [KelasController::class, 'store']);
    Route::post('/update/{kelas}', [KelasController::class, 'update']);
});

Route::prefix('/siswa')->group(function(){
    Route::get('/index', [SiswaController::class, 'index']);
    Route::get('/create', [SiswaController::class, 'create']);
    Route::get('/edit/{siswa}', [SiswaController::class, 'edit']);
    Route::get('/destroy/{siswa}', [SiswaController::class, 'destroy']);
    Route::post('/store', [SiswaController::class, 'store']);
    Route::post('/update/{siswa}', [SiswaController::class, 'update']);
});

Route::prefix('/mengajar')->group(function(){
    Route::get('/index', [MengajarController::class, 'index']);
    Route::get('/create', [MengajarController::class, 'create']);
    Route::get('/edit/{mengajar}', [MengajarController::class, 'edit']);
    Route::get('/destroy/{mengajar}', [MengajarController::class, 'destroy']);
    Route::post('/store', [MengajarController::class, 'store']);
    Route::post('/update/{mengajar}', [MengajarController::class, 'update']);
});

Route::prefix('/nilai')->group(function(){
    Route::get('/index', [NilaiController::class, 'index']);
    Route::get('/create', [NilaiController::class, 'create']);
    Route::get('/edit/{nilai}', [NilaiController::class, 'edit']);
    Route::get('/destroy/{nilai}', [NilaiController::class, 'destroy']);
    Route::post('/store', [NilaiController::class, 'store']);
    Route::post('/update/{nilai}', [NilaiController::class, 'update']);
});





// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
