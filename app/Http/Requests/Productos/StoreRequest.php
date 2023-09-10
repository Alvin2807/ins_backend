<?php

namespace App\Http\Requests\Productos;

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
            'codigo_producto' => 'string|required',
            'producto' => 'string|required|max:100',
            'fk_categoria' =>'integer|required',
            'fk_marca' =>'integer|required',
            'fk_modelo' =>'integer|required',
            'fk_disposicion' =>'integer|required',
            'fk_color' =>'integer|nullable',
            'usuario' =>'string|required|max:30'
        ];
    }
}
