<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use DateTime;

class LoginController extends Controller
{
    public function registerForm()
    {
        if (Auth::check())
        return redirect()->route('users.account');
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // Crea un objeto usuario para almacenar todos los parámetros
        $user = new User();

        $date = DateTime::createFromFormat('Y-m-d', $request->get('birthday'));

        if ($date !== false) {
            $user->birthday = $date->format('Y-m-d');
        } else {
            return redirect()->route('users.account');
        }

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->birthday = $request->get('birthday');
        $user->twitter = $request->get('twitter');
        $user->instagram = $request->get('instagram');
        $user->twitch = $request->get('twitch');
        $user->save();

        // Inicia sesión
        Auth::login($user);

        // Guarda la foto en la carpeta avatars dentro de public para no ocupar espacio en el servidor
        if ($request->file('avatar') == null) {
            $avatarName = 'public/media/default.png';
        } else {
            $avatarName = $request->file('avatar')->storeAs('public/avatars', 'avatar' . Auth::user()->id . '.png');
        }

        $user->avatar = $avatarName;
        return redirect()->route('users.account');
    }

    public function loginForm()
    {
        if (Auth::viaRemember())
            return 'Bienvenido de nuevo';
        else
            if (Auth::check())
            return redirect()->route('users.account');
        else
            return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->only('user', 'password');

        if (Auth::guard('web')->attempt($credenciales)) {
            $request->session()->regenerateToken();
            return redirect()->route('index');
        } else
            $error = 'Error al acceder a la aplicación';
        return view('auth.login', compact('error'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
