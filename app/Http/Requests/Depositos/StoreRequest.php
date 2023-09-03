<?php

namespace App\Http\Requests\Depositos;

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
            'usuario'     =>'required|string',
            'fk_despacho' =>'required|integer',
            'deposito'    =>'required|string'
        ];
    }
}
