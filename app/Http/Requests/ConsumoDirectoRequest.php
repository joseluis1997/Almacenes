<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConsumoDirectoRequest extends FormRequest
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
                    'FECHA'=>['required'],
                    'COMPROBANTE'=>['required'],
                    'NRO_ORD_COMPRA'=>['required','regex:/^[0-9]{3,6}$/','unique:CONSUMO_DIRECTOS,NRO_ORD_COMPRA'],
                    'NRO_PREVENTIVO'=>['required','regex:/^[0-9]{3,6}$/','unique:CONSUMO_DIRECTOS,NRO_PREVENTIVO'],
                    'NOTA_INGRESO'=>['required','regex:/^[0-9]{3,6}$/','unique:CONSUMO_DIRECTOS,NOTA_INGRESO'],
                    'COD_AREA'=>['required'],
                    'PROVEEDOR'=>['required'],
                ];
            case 'PUT':
                return [
                    'FECHA'=>['required'],
                    'COMPROBANTE'=>['required'],
                    'NRO_ORD_COMPRA'=>['required','regex:/^[0-9]{3,6}$/',Rule::unique('CONSUMO_DIRECTOS','NRO_ORD_COMPRA')->ignore($this->route('consumo_directo'))],
                    'NRO_PREVENTIVO'=>['required','regex:/^[0-9]{3,6}$/',Rule::unique('CONSUMO_DIRECTOS','NRO_PREVENTIVO')->ignore($this->route('consumo_directo'))],
                    'NOTA_INGRESO'=>['required','regex:/^[0-9]{3,6}$/',Rule::unique('CONSUMO_DIRECTOS','NOTA_INGRESO')->ignore($this->route('consumo_directo'))],
                    'COD_AREA'=>['required'],
                    'PROVEEDOR'=>['required'],
                ];
        }
    }
}
