<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PengembalianController;

Route::get('/', function () {
    return view('welcome');
});

// 🔐 PROTECTED ROUTES
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // ✅ Resource (cukup sekali)
    Route::resource('customers', CustomerController::class);
    Route::resource('products', ProdukController::class);

    // 🔄 Pengembalian
    Route::get('/retur/{id}', [PengembalianController::class, 'create']);
    Route::post('/retur', [PengembalianController::class, 'store']);

    // 📥 Import Excel
    Route::post('/import-customers',[CustomerController::class,'import']);

    // 👤 Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';