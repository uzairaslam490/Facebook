<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostController;

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

Route::match(['get','post'],'/', [UsersController::class, 'index'])->name('home');
Route::match(['get','post'],'/Profile/{user}', [UsersController::class, 'user'])->name('timeline');
Route::match(['get','post'],'/createpost/{id}', [UsersController::class, 'create'])->name('createpost');
Route::match(['get','post'],'/addpost/{id}', [PostController::class, 'update'])->name('addpost');




