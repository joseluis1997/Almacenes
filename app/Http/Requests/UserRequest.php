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

        if($this->route('id')){
            return [
                'CI' => 'required|integer',
                'NOMBRE' => 'required|max:50'. $this->route('id'),
                'APELLIDO' => 'required',
                'TELEFONO' => 'required',
                'NOM_USUARIO' => 'required|max:50'. $this->route('id'),
                'password' => 'nullable|min:5',
                're_password' => 'nullable|min:5|same:password',
                'rol' => 'required'
            ];
        }else{
            return [
                'CI' => 'required|integer',
                'NOMBRE' => 'required|max:50',
                'APELLIDO' => 'required',
                'TELEFONO' => 'required',
                'NOM_USUARIO' => 'required|max:50',
                'password' => 'required|min:5',
                're_password' => 'required|min:5|same:password',
                'rol' => 'required',
                'imagen' => 'required|mimes:jpeg,bmp,png'
            ];
        }
    }
}
