<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\LoginRequired;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::match(['get','post'],'/', [UsersController::class, 'index'])->name('login');
Route::match(['get','post'],'/confirmlogin', [UsersController::class, 'confirmlogin'])->name('confirmlogin');
Route::match(['get','post'],'/Profile/{userid}', [UsersController::class, 'userlogin'])->middleware('auth')->name('timeline');
Route::match(['get','post'],'/createpost/{id}', [UsersController::class, 'show'])->name('createpost');
Route::match(['get','post'],'/addpost/{id}', [PostController::class, 'update'])->name('addpost');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
