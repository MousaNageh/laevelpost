<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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



// php artisan make:model --help

Route::get('/register', [RegisterController::class,'index'])->name("register")->middleware(["guest"]);
Route::post('/register', [RegisterController::class,'store'])->middleware(["guest"]);//inhirt the name
Route::get("/login",[LoginController::class,"index"])->name("login")->middleware(["guest"]);
Route::post("/login",[LoginController::class,"login"])->name("login")->middleware(["guest"]);
Route::POST("/logout",[LogoutController::class,"logout"])->name("logout")->middleware(["auth"]);

Route::get("/dashboard",[DashboardController::class,"index"])->name("dashboard")->middleware(["auth"]);



Route::get('/posts',[PostController::class,"index"])->name("post")->middleware(["auth"]);
Route::post('/posts',[PostController::class,"store"])->middleware(["auth"]);
Route::post('/posts/like/{post}',[PostController::class,"like"])->middleware(["auth"])->name("like");
Route::delete('/posts/unlike/{post}',[PostController::class,"unlike"])->middleware(["auth"])->name("unlike");
Route::delete('/posts/delete/{post}',[PostController::class,"destory"])->middleware(["auth"])->name("deletepost");

Route::get("/",function(){
    return view("home");
});
