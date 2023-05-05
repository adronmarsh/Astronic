<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setLanguage(Request $request)
    {
        $language = $request->input('language', config('app.locale'));

        $cookie = cookie('language', $language, 30 * 24 * 60);

        return redirect()->back()->withCookie($cookie);
    }

    public function setFont(Request $request)
    {
        $fontFamily = $request->input('font-family');

        session(['fontFamily' => $fontFamily]);

        return redirect()->back();
    }

    public function setLocation(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        $user->latitude = $request->input('latitude');
        $user->longitude = $request->input('longitude');
        $user->save();

        return redirect()->route('settings')->with('success', 'Ubicación guardada correctamente.');
    }

    public function upgrade()
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        $user->premium = true;
        $user->save();

        return redirect()->back();
    }

    public function downgrade()
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        $user->premium = false;
        $user->save();

        return redirect()->back();
    }
}
