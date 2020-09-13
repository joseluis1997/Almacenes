<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'COD_PARTIDA' => 'required',
            'COD_MEDIDA' =>'required',
            'NOM_ARTICULO' => 'required|string',
            'DESC_ARTICULO' => 'required|string',
            'CANT_MINIMA' => 'required',
            'UBICACION' => 'required|string',
        ];
    }
}
