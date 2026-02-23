<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'artista' => 'required|string|max:255',
            'genero' => 'required|string|max:100',
            'discografia' => 'required|string|max:255',
            'formato' => 'required|string|max:50',
            'anio_publicacion' => 'required|integer|min:1900|max:' . date('Y'),
            'num_pistas' => 'required|integer|min:1',
            'minutos_duracion' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ];
    }
    public function messages()
    {
    return [
        'titulo.required' => 'El nombre es obligatorio',
        'artista.required' => 'El nombre es obligatorio',
        'genero.required' => 'El género musical es obligatorio',
        'discografia.required' => 'La discográfica es obligatoria',
        'formato.required' => 'El formato es obligatorio',
        'image.required' => 'La imagen del disco es obligatoria',
        'image.image' => 'El archivo debe ser una imagen válida',
        'image.mimes' => 'La imagen debe ser formato JPEG, PNG, JPG, GIF o WEBP',
        'image.max' => 'La imagen no puede superar los 5MB',
    ];
}
}
