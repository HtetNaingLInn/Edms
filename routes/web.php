<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
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
Route::view('/', 'welcome');

Route::get('logout/{id}', [UserController::class, 'logout'])->name('user.logout');

// Route::get('/admin',[HomeController::class,'dash']);
Route::view('/admin', 'admin.site.dashboard');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::group(['middleware' => ['can:isAdmin']], function () {

        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

        Route::get('message', [MessageController::class, 'index'])->name('message.index');

        Route::get('message/delete/{id}', [MessageController::class, 'destroy'])->name('message.delete');

    });

    Route::group(['middleware' => ['can:isAdminOrPostmen']], function () {

        Route::get('message/create', [MessageController::class, 'create'])->name('message.create');
        Route::post('message/store', [MessageController::class, 'store'])->name('message.store');

        Route::get('message/user/{id}/inbox', [MessageController::class, 'inbox'])->name('message.inbox');

        Route::get('message/user/{id}/sent', [MessageController::class, 'sent'])->name('message.sent');

        Route::get('message/{id}/show', [MessageController::class, 'show'])->name('message.show');

    });

    Route::group(['middleware' => ['can:isPostmen']], function () {

        Route::get('user/{id}/message', [MessageController::class, 'user_message'])->name('message.user');

    });

});
