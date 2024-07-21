<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\LapanganHargaController;
use App\Http\Controllers\LapanganKatController;
use App\Http\Controllers\MitraController;
use App\Models\KategoriLapangan;
use App\Models\LapanganHarga;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::middleware('role:0')->group(function () {
        Route::get('/user/home', function () {
            return view('user.home');
        })->name('user.home');

        Route::get('/user/sewa', [LandingController::class, 'index'])->name('user.sewa');
        Route::get('/sewa/lapangan', [LandingController::class, 'detail'])->name('user.lapangan');
        Route::get('/sewa/lapangan/jam/{lapangan_id}', [LandingController::class, 'lapangan_jam'])->name('user.lapangan_jam');
        Route::get('/sewa/lapangan/data-jam', [LandingController::class, 'data_jam'])->name('user.data_jam');
        Route::post('/sewa/lapangan/pesan', [LandingController::class, 'pesan'])->name('user.pesan');

        Route::get('user/dashboard', [DashboardUser::class, 'index'])->name('user.dashboard');
    });

    Route::middleware('role:1')->group(function () {
        Route::get('/admin/home', function () {
            return view('admin.home');
        })->name('admin.home');

        Route::resource('admin/mitra', MitraController::class);
        Route::resource('admin/lapangan', LapanganController::class);
        Route::resource('admin/katlap', LapanganKatController::class);
        Route::resource('admin/hargalap', LapanganHargaController::class);
    });

    Route::middleware('role:2')->group(function () {
        Route::get('/superadmin/home', function () {
            return view('superadmin.home');
        })->name('superadmin.home');
    });
});

Route::get('/home', function () {
    return view('home');
})->name('home');