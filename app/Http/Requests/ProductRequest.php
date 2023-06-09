<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string',
            'price' => 'required|numeric',
            'offer' => 'required|numeric',
            'url' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'El campo user_id es obligatorio.',
            'user_id.integer' => 'El campo user_id debe ser un número entero.',
            'user_id.unsigned' => 'El campo user_id debe ser un número entero sin signo.',
            'name.required' => 'El campo name es obligatorio.',
            'name.string' => 'El campo name debe ser una cadena de caracteres.',
            'price.required' => 'El campo price es obligatorio.',
            'price.numeric' => 'El campo price debe ser un número.',
            'offer.required' => 'El campo offer es obligatorio.',
            'offer.numeric' => 'El campo offer debe ser un número.',
            'url.string' => 'El campo url debe ser una cadena de caracteres.',
        ];
    }
}
