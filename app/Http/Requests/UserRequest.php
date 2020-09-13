<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        // validacion que ayduda a validad por parte del backend
        // dd($this->all());
        return [
            'ci' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'telephone' => 'required',
            'username' => 'required',
            'password' => 'required',
            'rol' => 'required',
            'imagen' => 'mimes:jpeg,bmp,png'
        ];
    }
}
