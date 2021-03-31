<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class MedidaRequest extends FormRequest
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
        
        // if($this.route('medida'))
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'NOM_MEDIDA' => ['required', 'regex:/^([A-ZÄËÏÖÜÁÉÍÓÚÂÊÎÔÛÀÈÌÒÙ]{0,2}[a-zëïöüáéíóúáéíóúâêîôûàèìòù]{3,30}[ ]?){1}$/','unique:MEDIDA,NOM_MEDIDA'],
                    'DESC_MEDIDA' => 'nullable'
                ];
            case 'PUT':
                return [
                    'NOM_MEDIDA' => ['required', 'regex:/^([A-ZÄËÏÖÜÁÉÍÓÚÂÊÎÔÛÀÈÌÒÙ]{0,2}[a-zëïöüáéíóúáéíóúâêîôûàèìòù]{3,30}[ ]?){1}$/', Rule::unique('MEDIDA','NOM_MEDIDA')->ignore($this->route('medida'))],
                    'DESC_MEDIDA' => 'nullable'
                ];
        }
    }
}
