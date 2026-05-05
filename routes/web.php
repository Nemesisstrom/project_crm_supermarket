<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PengembalianController;

Route::get('/', function () {
    return view('welcome');
});

// 🔐 PROTECTED ROUTES
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('customers', CustomerController::class);
    Route::resource('produks', ProdukController::class);

});

    // 🔄 Pengembalian
    Route::get('/retur/{id}', [PengembalianController::class, 'create']);
    Route::post('/retur', [PengembalianController::class, 'store']);

    // 📥 Import Excel
    Route::post('/import-customers',[CustomerController::class,'import']);

    // 👤 Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Penjualan
    Route::resource('penjualan', PenjualanController::class);

require __DIR__.'/auth.php';