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
Route::match(['get','post'],'/SignUp', [UsersController::class, 'signup'])->name('signup');
Route::match(['get','post'],'/confirmSignUp', [UsersController::class, 'confirmsignup'])->name('confirmsignup');
Route::match(['get','post'],'/', [UsersController::class, 'index'])->name('login');
Route::match(['get','post'],'/confirmlogin', [UsersController::class, 'confirmlogin'])->name('confirmlogin');
Route::match(['get','post'],'/Profile/{userid}', [UsersController::class, 'userlogin'])->middleware('auth')->name('timeline');
Route::match(['get','post'],'/createpost/{id}', [UsersController::class, 'show'])->middleware('auth')->name('createpost');
Route::match(['get','post'],'/addpost/{id}', [PostController::class, 'update'])->name('addpost');
Route::match(['get','post'],'/deletepost/{id}', [PostController::class, 'destroy'])->name('deletepost');
Route::match(['get','post'],'/logout/{id}', [UsersController::class, 'userlogout'])->middleware('auth')->name('logout');
