<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompraStockAlmacenRequest extends FormRequest
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
                    'COD_PROVEEDOR'=>['required'],
                    'COD_AREA'=>['required'],
                    'FECHA'=>['required'],
                    'COMPROBANTE'=>['required'],
                    'NRO_ORD_COMPRA'=>['required','regex:/^[0-9]{3,6}$/','unique:COMPRA_STOCKS,NRO_ORD_COMPRA'],
                    'NRO_PREVENTIVO'=>['required','regex:/^[0-9]{3,6}$/','unique:COMPRA_STOCKS,NRO_PREVENTIVO'],
                ];
            case 'PUT':
                return [
                    
                ];
        }
    }
}
