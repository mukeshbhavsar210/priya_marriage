<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/',[GuestController::class,'index'])->name('guest.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Users routes
    Route::get('/users-list',[UserController::class,'list'])->name('users.index');
    Route::get('/create-users',[UserController::class,'create'])->name('users.create');
    Route::post('/store-users',[UserController::class,'store'])->name('users.store');
    Route::get('/edit-users/{users}/edit',[UserController::class,'edit'])->name('users.edit');
    Route::put('/edit-users/{users}',[UserController::class,'update'])->name('users.update');
    Route::delete('/store-users/destroy/{$id}',[UserController::class,'destroy'])->name('users.destroy');

    //Guest routes
    Route::get('/guest-list',[GuestController::class,'index'])->name('guest.index');
    Route::get('/create-guest',[GuestController::class,'create'])->name('guest.create');
    Route::post('/store-guest',[GuestController::class,'store'])->name('guest.store');
    Route::get('/edit-guest/{guest}/edit',[GuestController::class,'edit'])->name('guest.edit');
    Route::put('/edit-guest/{guest}',[GuestController::class,'update'])->name('guest.update');
    Route::delete('/store-guest/destroy/{$id}',[GuestController::class,'destroy'])->name('guest.destroy');

    //City routes
    Route::get('/city',[FrontController::class,'city'])->name('cities.index');
    Route::post('/create-city',[FrontController::class,'store_city']); 

    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
       
});



require __DIR__.'/auth.php';
