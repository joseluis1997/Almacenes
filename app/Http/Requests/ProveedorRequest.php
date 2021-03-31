<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProveedorRequest extends FormRequest
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
                    'NIT' => ['required', 'regex:/^[0-9]{10,13}$/','unique:PROVEEDORES,NIT'],
                    'NOM_PROVEEDOR' => ['required', 'regex:/^([A-ZÄËÏÖÜÁÉÍÓÚÂÊÎÔÛÀÈÌÒÙ]{0,1}[a-zëïöüáéíóúáéíóúâêîôûàèìòù]{2,30}[ ]?)$/','unique:PROVEEDORES,NOM_PROVEEDOR'],
                    'TELEF_PROVEEDOR' => ['required', 'regex:/^[+]*[(]?[0-9]{1,4}[)]?[0-9-\s\.]+$/','unique:PROVEEDORES,TELEF_PROVEEDOR'],
                    'DIR_PROVEEDOR' => ['sometimes'],
                ];
            case 'PUT':
                return [
                    'NIT' => ['required', 'regex:/^[0-9]{10,13}$/',Rule::unique('PROVEEDORES','NIT')->ignore($this->route('proveedor'))],
                    'NOM_PROVEEDOR' => ['required', 'regex:/^([A-ZÄËÏÖÜÁÉÍÓÚÂÊÎÔÛÀÈÌÒÙ]{0,1}[a-zëïöüáéíóúáéíóúâêîôûàèìòù]{2,30}[ ]?)$/',Rule::unique('PROVEEDORES','NOM_PROVEEDOR')->ignore($this->route('proveedor'))],
                    'TELEF_PROVEEDOR' => ['required', 'regex:/^[+]*[(]?[0-9]{1,4}[)]?[0-9-\s\.]+$/',Rule::unique('PROVEEDORES','TELEF_PROVEEDOR')->ignore($this->route('proveedor'))],
                    'DIR_PROVEEDOR' => ['sometimes'],
                ];
        }
    }
}
