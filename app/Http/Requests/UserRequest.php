<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

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
       switch ($this->method()) {
                case 'GET':
                case 'DELETE':
                    return [];
                case 'POST':
                    return [
                        'CI' => ['required', 'regex:/^[0-9]{7,8}[T|R|W|A|G|M|Y|F|P|D|X|B|N|J|Z||S|Q|V|H|L|C|K|E]?$/','unique:users,CI'],
                        'NOMBRE' => ['required', 'regex:/^([A-Z]{1}[a-z]{2,20}[ ]?){1,2}$/','unique:users,NOMBRE'],
                        'APELLIDO' => ['required', 'regex:/^([A-Z]{1}[a-z]{2,30}[ ]?){1,3}$/'],
                        'TELEFONO' => ['required', 'regex:/^[+]*[(]?[0-9]{1,4}[)]?[0-9-\s\.]+$/','unique:users,TELEFONO'],
                        'NOM_USUARIO' => ['required', 'regex:/^[a-zA-Z0-9\_\-]{4,20}$/','unique:users,NOM_USUARIO'],
                        'password' => ['required', 'regex:/^[a-zA-Z0-9\_\-]{4,20}$/'],
                        're_password' => ['required', 'regex:/^.{4,20}$/','same:password'],
                        'rol' => 'required',
                        'imagen' => 'required|mimes:jpeg,bmp,png'
                    ];
                case 'PUT':
                    return [
                        'CI' => ['required', 'regex:/^[0-9]{7,8}[T|R|W|A|G|M|Y|F|P|D|X|B|N|J|Z||S|Q|V|H|L|C|K|E]?$/'],
                        'NOMBRE' => ['required', 'regex:/^([A-Z]{1}[a-z]{2,20}[ ]?){1,2}$/'],
                        'APELLIDO' => ['required', 'regex:/^([A-Z]{1}[a-z]{2,30}[ ]?){1,3}$/'],
                        'TELEFONO' => ['required', 'regex:/^[+]*[(]?[0-9]{1,4}[)]?[0-9-\s\.]+$/'],
                        'NOM_USUARIO' => ['required', 'regex:/^[a-zA-Z0-9\_\-]{4,20}$/'],
                        'password' => ['nullable', 'regex:/^.{4,20}$/','same:password'],
                        're_password' => ['nullable', 'regex:/^.{4,20}$/','same:password'],
                        'rol' => 'required'
                    ];
            }
        
    }
}