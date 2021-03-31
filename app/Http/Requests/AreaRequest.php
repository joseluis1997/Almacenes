<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AreaRequest extends FormRequest
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
        case 'POST': {
            return [
                'AREA_PADRE' => [
                    'sometimes',
                    Rule::exists('AREAS', 'COD_AREA')
                ],
                'NOM_AREA' => ['required','regex:/^([a-zA-ZÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ]{1,20}[ ]?){1,10}$/','unique:AREAS,NOM_AREA'],
                'UBICACION_AREA' => ['sometimes','regex:/^([a-zA-ZÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ]{1,20}[ ]?){1,10}$/'],
                'DESC_AREA' => 'sometimes'
            ];
        }
        case 'PUT': {
            return [
                'AREA_PADRE' => [
                    'sometimes',
                    Rule::exists('AREAS', 'COD_AREA')
                ],
                'NOM_AREA' => ['required','regex:/^([a-zA-ZÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ]{1,20}[ ]?){1,10}$/',Rule::unique('AREAS','NOM_AREA')->ignore($this->route('area'))],
                'UBICACION_AREA' => ['sometimes','regex:/^([a-zA-ZÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ]{1,20}[ ]?){1,10}$/'],
                'DESC_AREA' => 'sometimes'
            ];
            }
        }
    }

}
