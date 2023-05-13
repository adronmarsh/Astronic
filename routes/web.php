<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Models\Chat;
use App\Models\Post;
use App\Models\User;


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


// --------------------- Static ---------------------
Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/index', function () {
    $user = auth()->user();
    $posts = Post::latest()->get();
    return view('index', compact(['user', 'posts']));
})->name('index')->middleware(['auth', 'lang']);

// --------------------- Login ---------------------
Route::get('/register', [LoginController::class, 'registerForm'])->name('registerForm')->middleware('lang');
Route::post('/register', [Logincontroller::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'loginForm'])->name('loginForm')->middleware('lang');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// --------------------- Users ---------------------
Route::resource('/account', UserController::class)->middleware('auth');

// --------------------- Posts ---------------------
Route::resource('/posts', PostController::class)->middleware(['auth','lang']);
Route::post('/posts/{id}/like', [PostController::class, 'like'])->name('posts.like')->middleware(['auth', 'lang']);

// --------------------- Chat ---------------------
Route::resource('/chat', ChatController::class)->middleware(['auth', 'lang']);
Route::post('/search-chat', [UserController::class, 'search'])->name('searchChat')->middleware('auth');
Route::get('/chats/{userId}/{receiverId}', [ChatController::class, 'getChatMessages'])->middleware(['auth', 'lang']);


// --------------------- Settings ---------------------
Route::get('/settings', [SettingController::class, 'index'])->name('settings')->middleware(['auth', 'lang']);
Route::post('/set-language', [SettingController::class, 'setLanguage'])->name('setLanguage')->middleware('auth');
Route::post('/set-font', [SettingController::class, 'setFont'])->name('setFont')->middleware('auth');
Route::post('/set-location', [SettingController::class, 'setLocation'])->name('setLocation')->middleware('auth');
Route::get('/upgrade', [SettingController::class, 'upgrade'])->name('upgrade')->middleware('auth');
Route::get('/downgrade', [SettingController::class, 'downgrade'])->name('downgrade')->middleware('auth');
