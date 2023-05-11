<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:255',
            'content' => 'required',
            'media' => 'nullable|mimetypes:image/jpeg,image/png,image/gif,video/mp4|max:20480',
        ];
    }

    public function messages()
{
    return [
        'title.required' => 'El título es obligatorio.',
        'title.max' => 'El título no debe tener más de :max caracteres.',
        'content.required' => 'El contenido es obligatorio.',
        'media.mimetypes' => 'El archivo debe ser una imagen o un video en formato MP4.',
        'media.max' => 'El tamaño máximo del archivo es :max kilobytes.',
    ];

}

}
