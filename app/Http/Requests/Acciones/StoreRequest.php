<?php

namespace App\Http\Requests\Acciones;

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
         
            'fk_tipo_accion'         => 'required|integer',
            'no_nota'                => 'string|max:11',
            'fecha_nota'             => 'date',
            'fk_despacho'            => 'required|integer',
            'fk_despaho_requerido'   => 'required|integer',
            'usuario'                => 'required|string',
            'productos'              => 'sometimes|array|min:1',
            'productos.*.id_producto'=> 'required|integer',
            'productos.*.cantidad'   => 'required|integer',
            'productos.*.no_item'    => 'required|integer'
       
        ];
    }
}
