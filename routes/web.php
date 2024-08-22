<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductTransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('product_transactions', ProductTransactionController::class)->middleware('role:owner|buyer');

    Route::prefix('admin')->name('admin.')->group(function() {
        Route::resource('products', ProductController::class)->middleware('role:owner');
        Route::resource('categories', CategoryController::class)->middleware('role:owner');
    });
});

require __DIR__.'/auth.php';
