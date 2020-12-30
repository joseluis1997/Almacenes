<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'FK_COD_PARTIDA' => 'required',
                    'FK_COD_MEDIDA' =>'required',
                    'NOM_ARTICULO' => 'required|string|max:50',
                    'DESC_ARTICULO' => 'max:512',
                    'CANT_ACTUAL' => 'required|numeric',
                ];
            case 'PUT':
                return [
                    'FK_COD_PARTIDA' => 'required',
                    'FK_COD_MEDIDA' =>'required',
                    'NOM_ARTICULO' => 'required|string|max:50',
                    'DESC_ARTICULO' => 'sometimes|max:512',
                    'CANT_ACTUAL' => 'required',
                ];
        }

    }
}
