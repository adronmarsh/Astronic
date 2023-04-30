<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('index', function () {
    $user_id = auth()->user()->id;
    $user = User::findOrFail($user_id);
    return view('index', compact('user'));
})->name('index')->middleware('auth');

// --------------------- Login ---------------------
Route::get('register', [LoginController::class, 'registerForm']);
Route::post('register', [Logincontroller::class, 'register'])->name('register');
Route::get('login', [LoginController::class, 'loginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// --------------------- Users ---------------------
Route::resource('/miembros', UserController::class);
Route::get('cuenta', [UserController::class, 'cuenta'])->name('users.account')->middleware('auth');

// --------------------- Chat ---------------------
Route::get('chat', function () {
    $user_id = auth()->user()->id;
    $user = User::findOrFail($user_id);
    return view('chat', compact('user'));
})->name('chat')->middleware('auth');
