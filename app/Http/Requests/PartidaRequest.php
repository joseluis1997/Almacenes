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
                'NOM_PARTIDA' =>['required', 'regex:/^([a-zA-Z]{1}[,]?|[ ]?){2,}$/','unique:PARTIDA,NOM_PARTIDA'],
                'NRO_PARTIDA' => ['required', 'regex:/^[0-9]{4,6}$/','unique:PARTIDA,NRO_PARTIDA'],
                // 'PARTIDA_PADRE' => 'required',
            ];
        }
        case 'PUT': {
            return [
                'PARTIDA_PADRE' => [
                    'sometimes',
                    Rule::exists('PARTIDA', 'COD_PARTIDA')
                ],
                // 'PARTIDA_PADRE' => 'required',
                'NOM_PARTIDA' => ['required', 'regex:/^([a-zA-Z]{1}[,]?|[ ]?){2,}$/', Rule::unique('PARTIDA','NOM_PARTIDA')->ignore($this->route('partida'))],
                'NRO_PARTIDA' => ['required', 'regex:/^[0-9]{4,6}$/', Rule::unique('PARTIDA','NRO_PARTIDA')->ignore($this->route('partida'))],
            ];
            }
        }
    }
}
