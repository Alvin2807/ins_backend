<?php

namespace App\Http\Requests\Modelos;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'id_marca' =>'required|integer',
            'modelos'  =>'sometimes|array|min:1',
            'modelos.*.impresora' =>'required|string'
        ];
    }
}
