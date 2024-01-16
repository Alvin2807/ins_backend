<?php

namespace App\Http\Requests\Acciones;

use Illuminate\Foundation\Http\FormRequest;

class EditarRequest extends FormRequest
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
            'no_nota' =>'required|string',
            'fk_despaho_requerido' =>'required|integer',
            'funcionario_solicitud' =>'required|string',
            'lugar_destino' =>'required|string',
            'ciudad_destino' =>'required|string',
            'comentario' =>'required|string',
            'titulo_nota'=>'required|string',
            'usuario' =>'required|string',
            'productos' =>'sometimes|array|min:1',
            'productos.*.id_detalle_accion' =>'nullable|integer',
            'productos.*.fk_producto' =>'nullable|integer',
            'productos.*.cantidad_solicitada' =>'required|integer',
            'productos.*.no_item' =>'nullable|integer'
        ];
    }
}
