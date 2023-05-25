<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NoticeController;
use App\Models\Post;


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
})->name('/')->middleware('lang');

Route::get('/index', function () {
    $user = auth()->user();
    $posts = Post::latest()->get();
    return view('index', compact(['user', 'posts']));
})->name('index')->middleware(['auth', 'lang']);

Route::get('/upload', function () {
    return view('upload');
})->name('upload')->middleware(['auth', 'lang']);

Route::get('terms/contact', function () {
    return view('terms.contact');
});
Route::get('terms/cookie-policy', function () {
    return view('terms.cookie-policy');
});
Route::get('terms/copyright-policy', function () {
    return view('terms.copyright-policy');
});
Route::get('terms/legal-notice', function () {
    return view('terms.legal-notice');
});
Route::get('terms/privacy-policy', function () {
    return view('terms.privacy-policy');
});
Route::get('terms/terms-conditions', function () {
    return view('terms.terms-conditions');
});

// --------------------- Login ---------------------
Route::get('/register', [LoginController::class, 'registerForm'])->name('registerForm')->middleware('lang');
Route::post('/register', [Logincontroller::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'loginForm'])->name('loginForm')->middleware('lang');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// --------------------- Users ---------------------
Route::resource('/users', UserController::class)->middleware(['auth', 'lang']);
Route::get('/account', [UserController::class, 'account'])->name('account')->middleware(['auth', 'lang']);
Route::get('/follow/{user}', [UserController::class, 'follow'])->name('follow')->middleware(['auth', 'lang']);
Route::post('/users/{user}/follow', [UserController::class, 'follow'])->name('users.follow')->middleware(['auth', 'lang']);

// --------------------- Posts ---------------------
Route::resource('/posts', PostController::class)->middleware(['auth','lang']);
Route::post('/posts/{id}/like', [PostController::class, 'like'])->name('posts.like')->middleware(['auth', 'lang']);

// --------------------- Comments ---------------------
Route::resource('/comments', CommentController::class)->middleware(['auth','lang']);

// --------------------- Chat ---------------------
Route::resource('/chat', ChatController::class)->middleware(['auth', 'lang']);
Route::get('/chat/create/{receiverId}', [ChatController::class, 'newChat'])->name('newChat')->middleware('auth');

// --------------------- Messages ---------------------
Route::resource('/messages', MessageController::class)->middleware(['auth', 'lang']);

// --------------------- Settings ---------------------
Route::get('/settings', [SettingController::class, 'index'])->name('settings')->middleware(['auth', 'lang']);
Route::post('/set-language', [SettingController::class, 'setLanguage'])->name('setLanguage')->middleware('auth');
Route::post('/set-font', [SettingController::class, 'setFont'])->name('setFont')->middleware('auth');
Route::post('/set-location', [SettingController::class, 'setLocation'])->name('setLocation')->middleware('auth');
Route::get('/upgrade', [SettingController::class, 'upgrade'])->name('upgrade')->middleware('auth');
Route::get('/downgrade', [SettingController::class, 'downgrade'])->name('downgrade')->middleware('auth');

// --------------------- Shop ---------------------
Route::resource('/product', ProductController::class)->middleware(['auth', 'lang']);
Route::get('/shop/{id}', [ProductController::class, 'shop'])->name('shop')->middleware(['auth', 'lang']);
Route::resource('/cart', CartController::class)->middleware(['auth', 'lang']);

// --------------------- Notice ---------------------
Route::resource('/notice', NoticeController::class)->middleware(['auth', 'lang']);
Route::get('/notices/{id}', [NoticeController::class, 'userNotices'])->name('userNotices')->middleware(['auth', 'lang']);
