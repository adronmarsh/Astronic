<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            'user_id' => 'required|integer|unsigned',
            'media' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'El campo user_id es obligatorio.',
            'user_id.integer' => 'El campo user_id debe ser un número entero.',
            'user_id.unsigned' => 'El campo user_id debe ser un número entero sin signo.',
            'media.required' => 'El campo media es obligatorio.',
            'media.string' => 'El campo media debe ser una cadena de caracteres.',
        ];
    }
}
