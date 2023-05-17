<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class LoginController extends Controller
{
    public function registerForm()
    {
        if (Auth::check())
            return redirect()->route('index');
        else
            return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User();

        $user->rol = $request->get('rol');
        $user->user = $request->get('user');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        Auth::login($user);

        return redirect()->route('index');
    }

    public function loginForm()
    {
        if (Auth::check())
            return redirect()->route('index');
        else
            return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->only('user', 'password');

        if (filter_var($credenciales['user'], FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'user';
        }

        if (Auth::guard('web')->attempt([$field => $credenciales['user'], 'password' => $credenciales['password']])) {
            $request->session()->regenerateToken();
            return redirect()->route('index');
        } else {
            $error = 'El usuario o contraseña introducidos no son correctos';
            return view('auth.login', compact('error'));
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
