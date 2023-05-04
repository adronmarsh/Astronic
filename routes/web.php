<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;


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
})->name('index')->middleware('auth')->middleware('lang');

Route::get('settings', function () {
    $currentLanguage = app()->getLocale();
    $user_id = auth()->user()->id;
    $user = User::findOrFail($user_id);
    return view('settings', compact('user'));
})->name('settings')->middleware('auth')->middleware('lang');

// --------------------- Login ---------------------
Route::get('register', [LoginController::class, 'registerForm']);
Route::post('register', [Logincontroller::class, 'register'])->name('register');
Route::get('login', [LoginController::class, 'loginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// --------------------- Users ---------------------
Route::resource('/miembros', UserController::class)->middleware('auth');
Route::get('cuenta', [UserController::class, 'cuenta'])->name('users.account')->middleware('auth');

// --------------------- Chat ---------------------
Route::get('chat', function () {
    $user_id = auth()->user()->id;
    $user = User::findOrFail($user_id);
    return view('chat', compact('user'));
})->name('chat')->middleware('auth');

// --------------------- Language ---------------------
Route::post('/set-language', function (Request $request) {
    $language = $request->input('language', config('app.locale'));

    $cookie = cookie('language', $language, 30 * 24 * 60);

    return redirect()->back()->withCookie($cookie);
})->name('setLanguage')->middleware('auth');

// --------------------- Font ---------------------
Route::post('/set-font', function (Request $request) {
    $fontFamily = $request->input('font-family');
    session(['fontFamily' => $fontFamily]);
    return redirect()->back();
})->name('setFont')->middleware('auth')->middleware('lang');

// --------------------- Location ---------------------
Route::get('/user/location', 'LocationController@showForm')->name('user.location');
Route::post('/user/location', 'LocationController@store')->name('user.location.store');
