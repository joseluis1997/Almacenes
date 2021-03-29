<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
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
        // dd($this->route('role')->id);
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'nombre' => ['required', 'regex:/^([A-Z]{1}[a-z]{4,20}[ ]?){1}$/','unique:roles,name'],
                    'descripcion' => 'nullable'
                ];
            case 'PUT':
                return [
                    'nombre' => ['required', 'regex:/^([A-Z]{1}[a-z]{4,20}[ ]?){1}$/', Rule::unique('roles','name')->ignore($this->route('role')->id)],
                    'descripcion' => 'nullable'
                ];
        }
    }
}

           