<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;


class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'rol' => ['required', 'string', 'max:255'],
            'user' => ['required', 'string', 'min:3', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function messages()
    {
        return [
            'rol.required' => 'Debes indicar el tipo de cuenta.',
            'rol.string' => 'El tipo de cuenta debe tener como máximo 255 caracteres.',
            'user.required' => 'El nombre de usuario es obligatorio.',
            'user.min' => 'El nombre de usuario debe tener como mínimo 3 caracteres.',
            'user.max' => 'El nombre de usuario debe tener como máximo 20 caracteres.',
            'user.unique' => 'El nombre de usuario ya existe.',
            'email.required' => 'El email de usuario es obligatorio.',
            'email.max' => 'El email debe tener como máximo 255 caracteres.',
            'email.unique' => 'El email ya existe.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];
    }
}
