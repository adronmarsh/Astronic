<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'post_id' => 'required|integer|unsigned',
            'user_id' => 'required|integer|unsigned',
            'content' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'post_id.required' => 'El campo post_id es obligatorio.',
            'post_id.integer' => 'El campo post_id debe ser un número entero.',
            'post_id.unsigned' => 'El campo post_id debe ser un número entero sin signo.',
            'user_id.required' => 'El campo user_id es obligatorio.',
            'user_id.integer' => 'El campo user_id debe ser un número entero.',
            'user_id.unsigned' => 'El campo user_id debe ser un número entero sin signo.',
            'content.required' => 'El campo content es obligatorio.',
            'content.string' => 'El campo content debe ser una cadena de caracteres.',
            'content.max' => 'El contenido del mensaje no puede ser mayor de 255 caracteres.',
        ];
    }
}
