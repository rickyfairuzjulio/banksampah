<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Nasabah\NasabahController;
use App\Http\Controllers\Petugas\PetugasController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PriceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Routes organized by access level: Public, Nasabah (role:nasabah), Petugas
| (role:petugas), and Admin (role:admin). Controllers referenced should be
| implemented under App\Http\Controllers per Phase 3.
|
*/

// Public / Universal routes
Route::get('/', function () {
    if (app()->environment('testing')) {
        return response('SiSampah (testing)', 200);
    }
    return view('landing');
})->name('landing');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/edukasi', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/edukasi/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Nasabah routes (auth + role:nasabah)
Route::middleware(['auth', 'role:nasabah'])->prefix('nasabah')->name('nasabah.')->group(function () {
    Route::get('/dashboard', [NasabahController::class, 'dashboard'])->name('dashboard');
    Route::get('/jemput-sampah', [NasabahController::class, 'createPickup'])->name('jemput.create');
    Route::post('/jemput-sampah', [NasabahController::class, 'storePickup'])->name('jemput.store');
    Route::get('/dompet', [NasabahController::class, 'wallet'])->name('dompet');
    // Reuse ArticleController inside authenticated layout
    Route::get('/edukasi', [ArticleController::class, 'index'])->name('edukasi');
});

// Petugas routes (auth + role:petugas)
Route::middleware(['auth', 'role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/dashboard-manifes', [PetugasController::class, 'manifes'])->name('dashboard.manifes');
    Route::get('/input-timbangan/{user_id}', [PetugasController::class, 'showInput'])->name('input.timbangan');
    Route::post('/input-timbangan/{user_id}', [PetugasController::class, 'storeInput'])->name('input.timbangan.store');
    Route::get('/setor-mandiri', [PetugasController::class, 'setorMandiriForm'])->name('setor.mandiri');
    Route::post('/setor-mandiri', [PetugasController::class, 'setorMandiriStore'])->name('setor.mandiri.store');
});

// Admin routes (auth + role:admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('/harga-sampah', PriceController::class)->names('harga');
    Route::get('/validasi-keuangan', [AdminController::class, 'validasiKeuangan'])->name('validasi.keuangan');
    Route::post('/validasi-keuangan/{withdrawal}/approve', [AdminController::class, 'approveWithdrawal'])->name('validasi.keuangan.approve');
    Route::get('/konfigurasi-wilayah', [AdminController::class, 'konfigurasiWilayah'])->name('konfigurasi.wilayah');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
    Route::get('/laporan/export', [AdminController::class, 'exportLaporan'])->name('laporan.export');
});

