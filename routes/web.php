<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;

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
    return view('first');
});

// rute default awal, yang akan menuju ke halaman landing/login
Route::get('/login',[LoginController::class, 'index']);

Route::get('/daftar',[DaftarController::class, 'index']);
Route::post('/daftar-siswa',[DaftarController::class, 'store']);

// rute untuk mengecek data login, menggunakan function authenticate pada LoginController, hanya bisa diakses oleh guest
Route::post('/login-proses', [LoginController::class, 'authenticate'])->middleware('guest');

// rute untuk logout, menggunakan function logout pada LoginController, hanya bisa diakses oleh admin
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

// rute untuk halaman data, menggunakan method resource maka akan mengincludekan semua function pada DataController, hanya bisa diakses oleh admin
Route::resource('/data',DataController::class)->middleware('auth');

// rute untuk halaman program, menggunakan method resource maka akan mengincludekan semua function pada ProgramController, hanya bisa diakses oleh admin
Route::resource('/program',ProgramController::class)->middleware('auth');
