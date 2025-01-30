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
use App\Http\Controllers\UserAdminController;
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
// mitra detail
Route::get('/detail/udinus', function () {
    return view('user.page.mitra.detailmitra.udinus');
})->name('mitra.detail.udinus');
Route::get('/detail/minton', function () {
    return view('user.page.mitra.detailmitra.minton');
})->name('mitra.detail.minton');
Route::get('/detail/psis', function () {
    return view('user.page.mitra.detailmitra.psis');
})->name('mitra.detail.psis');
Route::get('/detail/liken', function () {
    return view('user.page.mitra.detailmitra.liken');
})->name('mitra.detail.liken');
Route::get('/detail/club', function () {
    return view('user.page.mitra.detailmitra.club');
})->name('mitra.detail.club');
Route::get('/detail/thechampion', function () {
    return view('user.page.mitra.detailmitra.thechampion');
})->name('mitra.detail.thechampion');
Route::get('/detail/arena', function () {
    return view('user.page.mitra.detailmitra.arena');
})->name('mitra.detail.arena');
Route::get('/detail/ormawa', function () {
    return view('user.page.mitra.detailmitra.ormawa');
})->name('mitra.detail.ormawa');
Route::get('/detail/porsik', function () {
    return view('user.page.mitra.detailmitra.porsik');
})->name('mitra.detail.porsik');
Route::get('/detail/zonasport', function () {
    return view('user.page.mitra.detailmitra.zonasport');
})->name('mitra.detail.zonasport');
Route::get('/detail/indosport', function () {
    return view('user.page.mitra.detailmitra.indosport');
})->name('mitra.detail.indosport');
Route::get('/detail/suara', function () {
    return view('user.page.mitra.detailmitra.suara');
})->name('mitra.detail.suara');

Route::middleware('auth')->group(function () {
    Route::middleware('role:0')->group(function () {
        
        // ragarent
        Route::get('/sewa/lapangan/data-jam', [LandingController::class, 'data_jam'])->name('user.data_jam');
        Route::post('/sewa/lapangan/pesan', [LandingController::class, 'pesan'])->name('user.pesan');
        Route::get('/sewa/lapangan/jam/{lapangan_id}', [LandingController::class, 'lapangan_jam'])->name('user.lapangan_jam');
        // dashboard
        Route::get('user/dashboard', [DashboardUser::class, 'index'])->name('user.dashboard');

        // ragabattle
        // Route::post('activity/{activity}/register', [RegistrationController::class, 'register'])->name('activities.register');
        // Route::post('activity/{activity}/unregister', [RegistrationController::class, 'unregister'])->name('activities.unregister');
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

        Route::get('admin/user', [UserAdminController::class, 'index'])->name('admin.user.index');
        Route::get('admin/user/create', [UserAdminController::class, 'create'])->name('admin.user.create');
        Route::post('admin/user', [UserAdminController::class, 'store'])->name('admin.user.store');
        Route::get('admin/user/{user}/edit', [UserAdminController::class, 'edit'])->name('admin.user.edit');
        Route::put('admin/user/{user}', [UserAdminController::class, 'update'])->name('admin.user.update');
        Route::delete('admin/user/{user}', [UserAdminController::class, 'destroy'])->name('admin.user.destroy');
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
