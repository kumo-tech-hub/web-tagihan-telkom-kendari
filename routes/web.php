<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\AccountManagerController;

Route::get('/', function () {
    return view('index');
});

// Email Manually
Route::get('/email-manual', function () {
    return view('email-manual');
})->middleware(['auth', 'verified'])->name('email.manual');

// Users
Route::get('/users', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('products')->middleware(['auth', 'verified'])->group(function() { // Pastikan middleware ada di sini
    Route::get('/', [ProdukController::class, 'index'])->name('products.index');
    Route::get('/create', [ProdukController::class, 'create'])->name('products.create');
    Route::post('/store', [ProdukController::class, 'store'])->name('products.store');
    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('products.edit');
    Route::put('/{id}', [ProdukController::class, 'update'])->name('products.update');
    Route::delete('/delete/{id}', [ProdukController::class, 'destroy'])->name('products.destroy');
});

Route::prefix('contracts')->middleware(['auth', 'verified'])->group(function() {
    Route::get('/', [ContractController::class, 'index'])->name('contracts.index');
    Route::get('/create', [ContractController::class, 'create'])->name('contracts.create');
    Route::post('/store', [ContractController::class, 'store'])->name('contracts.store');
    Route::get('/edit/{id}', [ContractController::class, 'edit'])->name('contracts.edit');
    Route::put('/{id}', [ContractController::class, 'update'])->name('contracts.update');
    Route::delete('/delete/{id}', [ContractController::class, 'destroy'])->name('contracts.destroy');
     Route::post('/store-contract', [ContractController::class, 'storeContract'])->name('contracts.store_contract');
});

Route::prefix('managers')->middleware(['auth', 'verified'])->name('managers.')->group(function() {
    Route::get('/', [AccountManagerController::class, 'index'])->name('index');
    Route::get('/create', [AccountManagerController::class, 'create'])->name('create');
    Route::post('/store', [AccountManagerController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AccountManagerController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AccountManagerController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [AccountManagerController::class, 'destroy'])->name('destroy');
});


require __DIR__.'/auth.php';