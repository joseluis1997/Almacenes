<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
          if($this->route('id')){
            return [
                'NIT' => 'required',
                'NOM_PROVEEDOR' => 'required|max:50'. $this->route('id'),
                'DIR_PROVEEDOR' => 'required',
                'TELEF_PROVEEDOR' => 'required',
            ];
        }else{
            return [
                'NIT' => 'required',
                'NOM_PROVEEDOR' => 'required|max:50',
                'DIR_PROVEEDOR' => 'sometimes',
                'TELEF_PROVEEDOR' => 'required',
            ];
        }
    }
}
