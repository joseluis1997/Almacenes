<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PartidaRequest extends FormRequest
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

        case 'POST': {
            return [
                'PARTIDA_PADRE' => [
                    'sometimes',
                    Rule::exists('PARTIDA', 'COD_PARTIDA')
                ],
                'NOM_PARTIDA' => 'required|string|max:255',
                'NRO_PARTIDA' => 'required|numeric',
                'PARTIDA_PADRE' => 'required',
            ];
        }
        case 'PUT': {
            return [
                'PARTIDA_PADRE' => [
                    'sometimes',
                    Rule::exists('PARTIDA', 'COD_PARTIDA')
                ],
                'PARTIDA_PADRE' => 'required',
                // 'NRO_PARTIDA' => 'required|numeric',
                'NOM_PARTIDA' => 'required|string|max:255',
            ];
            }
        }
    }
}
