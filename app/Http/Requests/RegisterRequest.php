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
            'name' => ['required', 'string', 'min:3', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthday' => ['required','date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre de usuario es obligatorio.',
            'name.min' => 'El nombre de usuario debe tener como mínimo 3 caracteres.',
            'name.max' => 'El nombre de usuario debe tener como máximo 20 caracteres.',
            'name.unique' => 'El nombre de usuario ya existe.',
            'email.required' => 'El email de usuario es obligatorio.',
            'email.max' => 'El email debe tener como máximo 255 caracteres.',
            'email.unique' => 'El email ya existe.',
            'birthday.required' => 'El campo de fecha de nacimiento es obligatorio',
            'birthday.date' => 'El campo de fecha de nacimiento debe contener el siguiente formato: YYYY-MM-DD',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];
    }
}
