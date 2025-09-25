<?php

use Illuminate\Support\Facades\Route;

// Controller untuk halaman tamu
use App\Http\Controllers\WelcomeController;

// Controller untuk halaman aplikasi
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\PengepulController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\PasarController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\TransaksiController; // <-- Pastikan baris ini ada
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\NegosiasiController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\EWalletController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// RUTE UNTUK PENGUNJUNG (TIDAK PERLU LOGIN)
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// RUTE UNTUK APLIKASI (YANG MEMBUTUHKAN LOGIN)
Route::prefix('app')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/background', [SettingsController::class, 'updateBackground'])->name('settings.updateBackground');

    Route::resource('petani', PetaniController::class);
    Route::resource('pengepul', PengepulController::class);
    Route::resource('distributor', DistributorController::class);
    Route::resource('pasar', PasarController::class);
    Route::resource('inventory', InventoryController::class);
    Route::get('/app/market', [MarketController::class, 'index'])->name('market.index');
    Route::resource('transaksi', TransaksiController::class);

    Route::resource('saldo', SaldoController::class);
Route::resource('negosiasi', NegosiasiController::class);
    Route::resource('inventaris', InventarisController::class);
    Route::resource('ewallet', EWalletController::class);
});