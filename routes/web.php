<?php

use App\Http\Controllers\AdminUsscController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\EventActivityController;
use App\Http\Controllers\EventAdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\LapanganHargaController;
use App\Http\Controllers\LapanganKatController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UsscController;
use App\Models\KategoriLapangan;
use App\Models\LapanganHarga;
use Illuminate\Support\Facades\Route;


Route::post('payment/callback', [RegistrationController::class, 'paymentCallback'])->name('payment.callback');
Route::get('/', function () {
    return view('user.home');
})->name('home');

// auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// view
Route::get('/user/sewa', [LandingController::class, 'index'])->name('user.sewa');
Route::get('/sewa/lapangan', [LandingController::class, 'detail'])->name('user.lapangan');
Route::get('/user/battle',[EventController::class,'index'])->name('user.page.battle.battle');
Route::get('user/mitra', [MitraController::class,'showMitra'])->name('user.mitra');
Route::get('mitra/{id}', [MitraController::class,'detail'])->name('mitra.detail');
// ussc
Route::get('/sewa/ussc', [UsscController::class,'index'])->name('ussc.index');

// view non controller
Route::get('/user/product', function () {
    return view('user.page.product');
})->name('user.page.product');
Route::get('/user/gallery', function () {
    return view('user.page.gallery');
})->name('user.page.gallery');
Route::get('/user/ticket', function () {
    return view('user.page.ticket');
})->name('user.page.ticket');
Route::get('/user/shop', function () {
    return view('user.page.shop');
})->name('user.page.shop');
Route::get('/user/trainer', function () {
    return view('user.page.trainer');
})->name('user.page.trainer');

Route::middleware('auth')->group(function () {
    Route::middleware('role:0')->group(function () {
        
        // ragarent
        Route::get('/sewa/lapangan/data-jam', [LandingController::class, 'data_jam'])->name('user.data_jam');
        Route::post('/sewa/lapangan/pesan', [LandingController::class, 'pesan'])->name('user.pesan');
        Route::get('/sewa/lapangan/jam/{lapangan_id}', [LandingController::class, 'lapangan_jam'])->name('user.lapangan_jam');
        // dashboard
        Route::get('user/dashboard', [DashboardUser::class, 'index'])->name('user.dashboard');

        // ragabattle
        Route::post('activity/{activity}/register', [RegistrationController::class, 'register'])->name('activities.register');
        Route::get('activity/{activity}/payment', [RegistrationController::class, 'showPaymentForm'])->name('activity.payment'); 
        Route::post('activity/{activity}/payment/process', [RegistrationController::class, 'processPayment'])->name('activity.payment.process');
        
        // ussc
        Route::get('/sewa/ussc/form',[UsscController::class, 'sewaussc'])->name('ussc.sewa');
        Route::get('/sewa/ussc/jam',[UsscController::class, 'ussc_jam'])->name('ussc.jam');
        Route::post('/sewa/ussc/pesan',[UsscController::class, 'pesanUssc'])->name('ussc.pesan');
       
    });

    Route::middleware('role:1')->group(function () {
        Route::get('/dashmin/home', function () {return view('admin.home');})->name('admin.home');

        Route::resource('admin/mitra', MitraController::class);
        Route::resource('admin/lapangan', LapanganController::class);
        Route::resource('admin/katlap', LapanganKatController::class);
        Route::resource('admin/hargalap', LapanganHargaController::class);
        Route::resource('events', EventAdminController::class);
        Route::resource('events.activities', EventActivityController::class);
        Route::get('/admin/events/registered-users', [EventAdminController::class, 'registeredUsers'])->name('events.registeredUsers');
        Route::delete('/admin/registrations/{id}', [EventAdminController::class, 'destroyRegistration'])->name('admin.registrations.destroy');
    });

    Route::middleware('role:2')->group(function () {
        Route::get('/superdashmin/home', function () {return view('superadmin.home');})->name('superadmin.home');
    });

    // ussc
    Route::middleware('role:3')->group(function () {
        Route::get('/minussc/home', [AdminUsscController::class, 'index'])->name('miminussc.home');
        Route::get('/miminussc/listsewa', [AdminUsscController::class, 'listsewa'])->name('miminussc.listsewa');
        Route::get('/miminussc/listpakai', [AdminUsscController::class, 'listpemakaian'])->name('miminussc.listpemakaian');
        Route::get('/miminussc/sewa/ussc/jam',[AdminUsscController::class, 'ussc_jam'])->name('miminussc.jam');


        Route::post('/miminussc/booking', [AdminUsscController::class, 'addSewa'])->name('miminussc.tambahSewa');
        Route::patch('/miminussc/update-status/{id}', [AdminUsscController::class, 'updateStatus'])->name('miminussc.updateStatus');
        Route::delete('/miminussc/delete-sewa/{id}', [AdminUsscController::class, 'deletePemesanan'])->name('miminussc.destroy');
    });
});
