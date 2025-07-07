<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AccountManagerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerContactPersonController;


Route::get('/', function () {
    return view('index');
});

// Contracts
Route::get('/contracts', function () {
    return view('contracts');
})->middleware(['auth', 'verified'])->name('contracts');

// Products
// Route::get('/products', function () {
//     return view('products');
// })->name('products.index');

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

Route::prefix('managers')->group(function() {
    Route::get('/', [AccountManagerController::class, 'index'])->name('managers.index');

    Route::get('/create', [AccountManagerController::class, 'create'])->name('managers.create');

    Route::post('/store', [AccountManagerController::class, 'store'])->name('managers.store');

    Route::get('/edit/{id}', [AccountManagerController::class, 'edit'])->name('managers.edit');

    Route::put('/{id}', [AccountManagerController::class, 'update'])->name('managers.update');

    Route::delete('/delete/{id}', [AccountManagerController::class, 'destroy'])->name('managers.destroy');
});

Route::prefix('customers')->group(function() {
    Route::get('/', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');

    Route::get('/create', [\App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');

    Route::post('/store', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');

    Route::get('/edit/{id}', [\App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');

    Route::put('/{id}', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');

});

Route::prefix('contact-person')->group(function() {
    Route::get('/create/{customerId}', [\App\Http\Controllers\CustomerContactPersonController ::class, 'create'])->name('contact-person.create');

    Route::post('/store', [\App\Http\Controllers\CustomerContactPersonController ::class, 'store'])->name('contact-person.store');

    Route::get('/edit/{id}', [\App\Http\Controllers\CustomerContactPersonController ::class, 'edit'])->name('contact-person.edit');

    Route::put('/{id}', [\App\Http\Controllers\CustomerContactPersonController ::class, 'update'])->name('contact-person.update');

    Route::delete('/delete/{id}', [\App\Http\Controllers\CustomerContactPersonController ::class, 'destroy'])->name('contact-person.destroy');
});

require __DIR__.'/auth.php';
