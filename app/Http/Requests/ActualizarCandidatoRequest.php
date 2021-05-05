<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;


class ActualizarCandidatoRequest extends FormRequest
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
        $id = $this->candidato->id;
        return [
            'name'=>'required',
            'surname'=>'required',
            'email'=>[
                'required',
                Rule::unique('candidatos')->ignore($id)
            ],
            'phone'=>[
                'required',
                Rule::unique('candidatos')->ignore($id)
            ],
            'rating'=>'min:1|max:10'
        ];
    }
}
