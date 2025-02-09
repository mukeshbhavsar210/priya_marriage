<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[GuestController::class,'viewHome'])->name('user.index');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    //Users routes
    Route::get('admin/users-list',[UserController::class,'list'])->name('users.index');
    Route::get('admin/create-users',[UserController::class,'create'])->name('users.create');
    Route::post('admin/store-users',[UserController::class,'store'])->name('users.store');
    Route::get('admin/edit-users/{users}/edit',[UserController::class,'edit'])->name('users.edit');
    Route::put('admin/edit-users/{users}',[UserController::class,'update'])->name('users.update');
    Route::delete('admin/store-users/destroy/{$id}',[UserController::class,'destroy'])->name('users.destroy');

    //Guest routes
    Route::get('admin/guest-list',[GuestController::class,'index'])->name('guest.index');
    Route::get('admin/create-guest',[GuestController::class,'create'])->name('guest.create');
    Route::post('admin/store-guest',[GuestController::class,'store'])->name('guest.store');
    Route::get('admin/edit/{guest}',[GuestController::class,'edit'])->name('guest.edit');
    Route::put('admin/edit/{guest}',[GuestController::class,'update'])->name('guest.update');
    Route::delete('admin/delete/{id}',[GuestController::class,'destroy'])->name('guest.delete');

    //Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.delete');

    //City routes
    Route::get('admin/city',[FrontController::class,'city'])->name('cities.index');
    Route::post('admin/create-city',[FrontController::class,'store_city']);  

    //Profile
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';