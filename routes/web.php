<?php

use App\Http\Controllers\AddFotoController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/login', function () {
//     return view('login');
// })->name('login');

// Route::get('/register', function () {
//     return view('signin');
// })->name('register');

// Route::get('/', function () {
//     return view('maincontain.index');
// })->name('home');
// Route::get('/add', function () {
//     return view('addimage.index');
// })->name('add');

Route::get('/',[HomeController::class,'index'])->name('home');

Route::post('/login-post', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register-post', [AuthController::class, 'registerPost'])->name('register.post');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/profile/{id}', [ProfileController::class,'index'])->name('profile');
Route::get('/profile/{id}/edit', [ProfileController::class,'edit'])->name('profile.edit');
Route::post('/profile/{id}/update', [ProfileController::class,'update'])->name('profile.update');

Route::get('/album',[AlbumController::class,'index'])->name('album');

Route::post('/album/create', [AlbumController::class,'store'])->name('album.create');
Route::get('/album/{id}', [ProfileController::class, 'album'])->name('album.show');

Route::get('/album/foto/{id}',[AlbumController::class, 'show'])->name('album.foto');
Route::get('/add/{id}' ,[AddFotoController::class,'index'])->name('add.foto');
Route::post('foto/add',[AddFotoController::class,'store'])->name('foto.create');

Route::get('/foto/{id}',[HomeController::class, 'foto'])->name('foto'); 
use App\Http\Controllers\LikeController;

Route::post('/like/{postId}', [LikeController::class, 'toggleLike'])->name('like.toggle');

