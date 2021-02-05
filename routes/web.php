<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

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
Route::view('/','welcome');

Route::view('/admin','admin.site.dashboard');

// Route::view('/','dashboard')->name('dashboard');

Route::group(['prefix' => 'admin'], function () {
    Route::get('user',[UserController::class,'index'])->name('user.index');
    Route::get('user/create',[UserController::class,'create'])->name('user.create');
    Route::post('user/store',[UserController::class,'store'])->name('user.store');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('user.update');
    Route::get('user/delete/{id}',[UserController::class,'destroy'])->name('user.delete');

});


Route::group(['prefix' => 'admin'], function () {
    Route::get('message/create',[MessageController::class,'create'])->name('message.create');
    Route::post('message/store',[MessageController::class,'store'])->name('message.store');
    Route::get('message',[MessageController::class,'index'])->name('message.index');
    Route::get('message/delete/{id}',[MessageController::class,'destroy'])->name('message.delete');





});

