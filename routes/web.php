<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

// Contracts
Route::get('/contracts', function () {
    return view('contracts');
})->middleware(['auth', 'verified'])->name('contracts');

// Products
Route::get('/products', function () {
    return view('products');
})->middleware(['auth', 'verified'])->name('products.index');

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

require __DIR__.'/auth.php';
