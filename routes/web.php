<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\PublicController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\Admin\PeopleController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OfficerController;
use App\Http\Controllers\Admin\ResponseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Instansi\InstansiController;
use App\Http\Controllers\Admin_instansi\AgencyController;
use App\Http\Controllers\Admin_instansi\ManageController;
use App\Http\Controllers\Admin_instansi\AdminAgencyController;
use App\Http\Controllers\Admin_instansi\ResponseInstansiController;
use App\Http\Controllers\Admin_instansi\InstansiDashboardController;

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

Route::get('/', [PublicController::class, 'index'])->name('submit');

Route::middleware('IsPeople')->group(function() {
    Route::get('/laporan/{siapa?}', [PublicController::class, 'laporan'])->name('laporan');
    Route::post('/no', [PublicController::class, 'store'])->name('submit.report');
    Route::put('/laporan/{id_message}', [PublicController::class, 'update'])->name('laporan.update');
    Route::delete('/laporan/{id_message}', [PublicController::class, 'destroy'])->name('laporan.destroy');
});

Route::middleware('guest')->group(function() {
    Route::post('/anonime', [PublicController::class, 'store'])->name('submit.anonime');
    Route::get('register', [AuthController::class, 'formRegister'])->name('formRegister');
    Route::get('/laporan/ditel/{kode}', [PublicController::class, 'show'])->name('laporan.show');

    Route::post('/login/auth', [AuthController::class, 'authenticate'])->name('login');
    Route::post('register/auth', [AuthController::class, 'register'])->name('register');
    Route::get('/logout', [AuthController::class, 'logout'])->name('pekat.logout');
    Route::get('passwordreset', [AuthController::class, 'showLinkRequestForm'])->name('password.request');

    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('instansi', [InstansiController::class, 'index'])->name('instansi');
    Route::get('/instansi/search', [InstansiController::class, 'search'])->name('instansi.search');
    Route::get('/instansi/{slug}', [InstansiController::class, 'show'])->name('instansi.show');
    Route::post('/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');

});

Route::prefix('admin')->group(function(){

    Route::middleware('IsAdmin')->group(function() {

        Route::resource('masyarakat', PeopleController::class);
        Route::resource( 'petugas', OfficerController::class);
        Route::get('laporan',[LaporanController::class, 'index'])->name('laporan.index');
        Route::post('laporan/getLaporan',[LaporanController::class, 'getLaporan'])->name('laporan.getLaporan');
        Route::get('laporan/cetak/{from}/{to}', [LaporanController::class , 'cetakLaporan'])->name('laporan.cetak');
    });

    Route::middleware('IsOfficer')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('pengaduan', MessageController::class);
        Route::post('tanggapan', [ResponseController::class, 'createOrUpdate'])->name('tanggapan');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    });


    Route::middleware('IsGuest')->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin.formLogin');
        Route::post('/login/auth', [AdminController::class, 'authenticate'])->name('admin.login');

    });
});

Route::prefix('admin_instansi')->group(function() {

        Route::middleware('IsAgency')->group(function() {
            Route::get('/kelola', [ManageController::class, 'index'])->name('kelola.index');
            Route::resource( 'kelola', ManageController::class);
        });

        Route::middleware('IsAdminAgency')->group(function() {
            Route::get('/instansi', [AgencyController::class, 'index'])->name('instansi.index');
            Route::get('/instansi/{id}/detail', [AgencyController::class, 'lihatInstansi'])->name('admin_instansi.show');
            Route::get('/instansi/{id}/laporan', [AgencyController::class, 'laporan'])->name('instansi.laporan');
            Route::get('/dashboard', [InstansiDashboardController::class, 'index'])->name('admin_instansi_dashboard.index');
            Route::post('/tanggapan/instansi', [ResponseInstansiController::class, 'createOrUpdate'])->name('tanggapan.instansi');
            Route::get('/logout', [AdminAgencyController::class, 'logout'])->name('admin_instansi.logout');
        });

        Route::middleware('IsGuestAgency')->group(function() {
            Route::get('/', [AdminAgencyController::class, 'index'])->name('admin_instansi.index');
            Route::post('/login/auth', [AdminAgencyController::class, 'authenticate'])->name('admin_instansi.login');
        });

});



Route::get('/cetak', function() {
    return view('admin.Laporan.cetak');
});