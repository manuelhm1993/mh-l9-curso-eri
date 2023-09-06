<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Permitir que todos los usuarios puedan crear video juegos
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // Reglas de validación para los campos
        return [
            // El trim validator ya viene por defecto en el middleware web, basta con usar required
            'name'        => 'required|max:255',
            'category_id' => 'required',
        ];
    }
}
