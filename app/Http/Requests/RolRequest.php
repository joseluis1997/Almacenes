<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolRequest extends FormRequest
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
                        'nombre' => ['required', 'regex:/^([A-Z]{1}[a-z]{2,20}[ ]?){1,2}$/'],
                        'descripcion' => 'nullable'
                    ];
                case 'PUT':
                    return [
                        'nombre' => ['required', 'regex:/^([A-Z]{1}[a-z]{2,20}[ ]?){1,2}$/'],
                        'descripcion' => 'nullable'
                    ];
            }
    }
}

           