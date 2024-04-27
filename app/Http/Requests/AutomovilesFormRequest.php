<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutomovilesFormRequest extends FormRequest
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
            //
            'Marca' => 'required|string|max:20',
            'Referencia' => 'required|string|max:20',
            'Descripcion' => 'string|max:200',
        ];
    }
}
