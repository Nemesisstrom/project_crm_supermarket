<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    if (auth()->check()) {
        return redirect('/dashboard');
    }

    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | CUSTOMER
    |--------------------------------------------------------------------------
    */

    Route::resource('customers', CustomerController::class);

    /*
    |--------------------------------------------------------------------------
    | PRODUK
    |--------------------------------------------------------------------------
    */

    Route::resource('produks', ProdukController::class);

    /*
    |--------------------------------------------------------------------------
    | PENJUALAN
    |--------------------------------------------------------------------------
    */

    Route::resource('penjualan', PenjualanController::class);

    /*
    |--------------------------------------------------------------------------
    | PENGEMBALIAN / RETUR
    |--------------------------------------------------------------------------
    */

    Route::resource('pengembalian', PengembalianController::class)
        ->except(['create']);

    // Form create retur berdasarkan penjualan
    Route::get(
        '/pengembalian/create/{penjualan_id}',
        [PengembalianController::class, 'create']
    )->name('pengembalian.create');

    // Approve retur
    Route::post(
        '/pengembalian/{id}/approve',
        [PengembalianController::class, 'approve']
    )->name('pengembalian.approve');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
