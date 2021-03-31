<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class ArticuloRequest extends FormRequest
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
        // dd($this->route('articulo')->COD_ARTICULO);
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'FK_COD_PARTIDA' => ['required'],
                    'FK_COD_MEDIDA' =>['required'],
                    'NOM_ARTICULO' => ['required','regex:/^([A-ZÄËÏÖÜÁÉÍÓÚÂÊÎÔÛÀÈÌÒÙ]{0,1}[a-zëïöüáéíóúáéíóúâêîôûàèìòù]{1,30}[ ]?){1,10}$/','unique:ARTICULO,NOM_ARTICULO'],
                    'MARCA' => ['required','regex:/^([A-ZÄËÏÖÜÁÉÍÓÚÂÊÎÔÛÀÈÌÒÙ]{0,1}[a-zëïöüáéíóúáéíóúâêîôûàèìòù]{1,30}[ ]?){1,10}$/'],
                    'DESC_ARTICULO' => 'max:512',
                ];
            case 'PUT':
                return [
                    'FK_COD_PARTIDA' => 'required',
                    'FK_COD_MEDIDA' =>'required',
                    'NOM_ARTICULO' => ['required','regex:/^([A-ZÄËÏÖÜÁÉÍÓÚÂÊÎÔÛÀÈÌÒÙ]{0,1}[a-zëïöüáéíóúáéíóúâêîôûàèìòù]{1,30}[ ]?){1,10}$/',Rule::unique('ARTICULO','NOM_ARTICULO')->ignore($this->route('articulo'))],                    
                    'MARCA' => 'required',
                    'DESC_ARTICULO' => 'sometimes|max:512',
                ];
        }

    }
}
