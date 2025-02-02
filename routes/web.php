<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//City routes
Route::get('/city',[FrontController::class,'city']);
Route::post('/create-city',[FrontController::class,'store_city']);

//Guest gutes
Route::get('/',[GuestController::class,'index'])->name('guest.index');
Route::get('/create-guest',[GuestController::class,'create'])->name('guest.create');
Route::post('/create-guest',[GuestController::class,'store'])->name('guest.store');
Route::get('/edit/{guest}/edit',[GuestController::class,'edit'])->name('guest.edit');
Route::put('/update/{guest}',[GuestController::class,'update'])->name('guest.update');
Route::delete('/store-guest/destroy/{$id}',[GuestController::class,'destroy'])->name('guest.destroy');