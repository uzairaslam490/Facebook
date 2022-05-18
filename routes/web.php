<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FollowedUsersController;
use App\Http\Controllers\LikedPostsController;
use App\Http\Controllers\PostController;
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
//User
Auth::routes();
//SignUp
Route::match(['get','post'],'/SignUp', [UsersController::class, 'signup'])->name('signup');
Route::match(['get','post'],'/confirmSignUp', [UsersController::class, 'confirmsignup'])->name('confirmsignup');
//Followers
Route::match(['get','post'],'/followedusers', [FollowedUsersController::class, 'create'])->middleware('auth')->name('followedusers');
Route::match(['get','post'],'/followed/{id}/{userid}', [FollowedUsersController::class, 'followed'])->middleware('auth')->name('followed');
//Login
Route::match(['get','post'],'/', [UsersController::class, 'index'])->name('login');
Route::match(['get','post'],'/confirmlogin', [UsersController::class, 'confirmlogin'])->name('confirmlogin');
//Timeline
Route::match(['get','post'],'/Profile/{userid}', [UsersController::class, 'userlogin'])->middleware('auth')->name('timeline');
//Posts
Route::match(['get','post'],'/createpost/{id}', [UsersController::class, 'show'])->middleware('auth')->name('createpost');
Route::match(['get','post'],'/addpost/{id}', [PostController::class, 'update'])->name('addpost');
Route::match(['get','post'],'/deletepost/{id}', [PostController::class, 'destroy'])->middleware('auth')->name('deletepost');
//Comments
Route::match(['get','post'],'/comments/{id}/{userid}', [UsersController::class, 'comment'])->middleware('auth')->name('comments');
Route::match(['get','post'],'/addcomment/{id}/{userid}', [CommentsController::class, 'store'])->middleware('auth')->name('addcomment');
Route::match(['get','post'],'/deletecomment/{id}', [CommentsController::class, 'destroy'])->middleware('auth')->name('deletecomment');
//Likes
Route::match(['get','post'],'/likes/{id}', [LikedPostsController::class, 'likes'])->middleware('auth')->name('likes');
Route::match(['get','post'],'/likepost/{id}/{userid}', [LikedPostsController::class, 'likepost'])->middleware('auth')->name('likepost');
Route::match(['get','post'],'/followerlikes/{id}/{userid}', [LikedPostsController::class, 'followerlikes'])->middleware('auth')->name('followerlikes');
//Logout
Route::match(['get','post'],'/logout/{id}', [UsersController::class, 'userlogout'])->middleware('auth')->name('logout');

//Admin

//Login
Route::match(['get','post'],'/admin', [AdminController::class, 'login'])->name('adminlogin');
Route::match(['get','post'],'/confirmadminlogin', [AdminController::class, 'confirmlogin'])->name('confirmadminlogin');

//Dashboard
Route::match(['get','post'],'/dashboard/{adminid}', [AdminController::class, 'dashboard'])->middleware('authadmin')->name('dashboard');

//AddAdmin
Route::match(['get','post'],'/addadmin/{adminid}', [AdminController::class, 'addadmin'])->middleware('authadmin')->name('addadmin');
Route::match(['get','post'],'/newadmin', [AdminController::class, 'newadmin'])->middleware('authadmin')->name('newadmin');
//Posts
Route::match(['get','post'],'/posts/{adminid}', [AdminController::class, 'posts'])->middleware('authadmin')->name('posts');
Route::match(['get','post'],'/fullpost/{adminid}/{id}', [AdminController::class, 'fullpost'])->middleware('authadmin')->name('fullpost');

//Comments
Route::match(['get','post'],'/tablecomments/{adminid}', [AdminController::class, 'comments'])->middleware('authadmin')->name('tablecomments');

//logout
Route::match(['get','post'],'/adminlogout/{id}', [AdminController::class, 'adminlogout'])->middleware('authadmin')->name('adminlogout');


//Finish