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


Route::get('/', function () {
    return view('user.home');
})->name('home');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// view
Route::get('/user/sewa', [LandingController::class, 'index'])->name('user.sewa');
Route::get('/sewa/lapangan', [LandingController::class, 'detail'])->name('user.lapangan');

// view non controller
Route::get('/user/product', function () {return view('user.page.product');})->name('user.page.product');
Route::get('/user/gallery', function () {return view('user.page.gallery');})->name('user.page.gallery');
Route::get('/user/event', function () {return view('user.page.event');})->name('user.page.event');
// Route::get('/user/mitra', function () {return view('user.page.mitra');})->name('user.page.mitra');
Route::get('user/mitra', [MitraController::class,'showMitra'])->name('user.mitra');
Route::get('mitra/{id}', [MitraController::class,'detail'])->name('mitra.detail');
Route::get('/user/battle', function () {return view('user.page.battle');})->name('user.page.battle');
Route::get('/user/ticket', function () {return view('user.page.ticket');})->name('user.page.ticket');
Route::get('/user/shop', function () {return view('user.page.shop');})->name('user.page.shop');
Route::get('/user/trainer', function () {return view('user.page.trainer');})->name('user.page.trainer');

Route::middleware('auth')->group(function () {
    Route::middleware('role:0')->group(function () {
        
        Route::get('/sewa/lapangan/data-jam', [LandingController::class, 'data_jam'])->name('user.data_jam');
        Route::post('/sewa/lapangan/pesan', [LandingController::class, 'pesan'])->name('user.pesan');
        Route::get('/sewa/lapangan/jam/{lapangan_id}', [LandingController::class, 'lapangan_jam'])->name('user.lapangan_jam');
        Route::get('user/dashboard', [DashboardUser::class, 'index'])->name('user.dashboard');
    });

    Route::middleware('role:1')->group(function () {
        Route::get('/admin/home', function () {return view('admin.home');})->name('admin.home');

        Route::resource('admin/mitra', MitraController::class);
        Route::resource('admin/lapangan', LapanganController::class);
        Route::resource('admin/katlap', LapanganKatController::class);
        Route::resource('admin/hargalap', LapanganHargaController::class);
    });

    Route::middleware('role:2')->group(function () {
        Route::get('/superadmin/home', function () {return view('superadmin.home');})->name('superadmin.home');
    });
});
