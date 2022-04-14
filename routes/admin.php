<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\{AdminProfileController, BrandController, CategoryController};

Route::middleware(['admin:admin'])->group(function () {
    Route::get('login', [AdminController::class, 'loginForm']);
    Route::post('login', [AdminController::class, 'store'])->name('login');
});

Route::get('logout', [AdminController::class, 'destroy'])->name('logout');

Route::get('profile', [AdminProfileController::class, 'adminProfile'])->name('profile');
Route::get('profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('profile.edit');
Route::post('profile/edit', [AdminProfileController::class, 'adminProfileStore'])->name('profile.store');

Route::get('change/password', [AdminProfileController::class, 'adminChangePassword'])->name('change.password');
Route::post('change/password', [AdminProfileController::class, 'adminUpdatePassword'])->name('update.password');

Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});

Route::resource('brands', BrandController::class)->except(['create', 'show']);
Route::resource('categories', CategoryController::class)->except(['create', 'show']);
