<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AccountManagerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContractController;

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/filter', [DashboardController::class, 'getFilteredData'])->middleware(['auth', 'verified'])->name('dashboard.filter');
// Email Manually
Route::get('/email-manual', function () {
    return view('email-manual');
})->middleware(['auth', 'verified'])->name('email.manual');

// Users
Route::get('/users', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users.index');


// Managers
// Route::get('/managers', function () {
//     return view('managers');
// })->middleware(['auth', 'verified'])->name('managers');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('products')->middleware(['auth', 'verified'])->group(function() {

    Route::get('/', [ProdukController::class, 'index'])->name('products.index');
    Route::get('/create', [ProdukController::class, 'create'])->name('products.create');
    Route::post('/store', [ProdukController::class, 'store'])->name('products.store');
    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('products.edit');
    Route::put('/{id}', [ProdukController::class, 'update'])->name('products.update');
    Route::delete('/delete/{id}', [ProdukController::class, 'destroy'])->name('products.destroy');
});


Route::prefix('customer')->middleware(['auth', 'verified'])->group(function() {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
     Route::post('/store-customer', [CustomerController::class, 'storeCustomer'])->name('customer.store_customer');
});

Route::prefix('managers')->middleware(['auth', 'verified'])->name('managers.')->group(function() {
    Route::get('/', [AccountManagerController::class, 'index'])->name('index');
    Route::get('/create', [AccountManagerController::class, 'create'])->name('create');
    Route::post('/store', [AccountManagerController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AccountManagerController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AccountManagerController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [AccountManagerController::class, 'destroy'])->name('destroy');
});

Route::prefix('contracts')->middleware(['auth', 'verified'])->name('contracts.')->group(function() {
    Route::get('/', [ContractController::class, 'listContracts'])->name('list');
    Route::get('/create', [ContractController::class, 'create'])->name('create');
    Route::post('/store', [ContractController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ContractController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ContractController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [ContractController::class, 'destroy'])->name('destroy');
});

Route::get('/user-dashboard', function () {
    return view('user-dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');


require __DIR__.'/auth.php';
