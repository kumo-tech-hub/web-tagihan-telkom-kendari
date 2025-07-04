<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;


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
Route::get('/managers', function () {
    return view('managers');
})->middleware(['auth', 'verified'])->name('managers');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});







Route::prefix('products')->group(function() {
    Route::get('/', [ProdukController::class, 'index'])->name('products.index');

    Route::get('/create', [ProdukController::class, 'create'])->name('products.create');

    Route::post('/store', [ProdukController::class, 'store'])->name('products.store');

    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('products.edit');

    Route::put('/{id}', [ProdukController::class, 'update'])->name('products.update');

    Route::delete('/delete/{id}', [ProdukController::class, 'destroy'])->name('products.destroy');
});

require __DIR__.'/auth.php';
