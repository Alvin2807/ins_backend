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
            /* 'incidencia'       => 'required|integer', */
            'fk_tipo_accion'        => 'required|integer',
            'no_nota'               => 'string|max:11',
            'fecha_nota'            => 'date',
            'fk_despacho'           => 'required|integer',
            'fk_despaho_requerido'  => 'required|integer',
            'usuario'               => 'required|string',
            'detalles'              => 'sometimes|array|min:1',
            'detalles.*.id_producto'=> 'required|integer',
            'detalles.*.cantidad' => 'required|integer'
        /*     'fecha_incidencia' => 'required|date',
            'fecha_registro'   => 'nullable|date',
            'fk_despacho'      => 'required|integer',
            'entregado_por'    => 'required|string|max:100',
            'estado'           => 'nullable|string',
            'cantidad_total'   => 'integer',
            'usuario'          => 'required|string|max:30',
            'comentario'       => 'nullable|string|max:300',
            "detalles"         => 'sometimes|array|min:1',
            "detalles.*.fk_producto" => 'required|integer',
            "detalles.*.cantidad" => 'required|integer' */
        ];
    }
}
