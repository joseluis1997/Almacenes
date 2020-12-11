<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'NOM_MEDIDA' => 'required|string|max:255',
            'DESC_MEDIDA' => 'nullable|string|max:255',
            ];
    }
}
