<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateParcAutoRequest extends FormRequest
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
        $model=$this->route('parc_auto');
        return [
            'marque' => 'required|max:255',
            'modele' => 'required|max:255',
            'immatriculation' => 'nullable|max:255',
            //'immatriculation' => ['required', 'immatriculation', 'max:255', Rule::unique('parc_autos')->ignore($model)],
            'numchassi' => 'required|max:255',
            //'photo' => 'nullable|mimes:JPG,PNG,JPEG|max:5048',
            'couleur' => 'nullable|max:255',
            'kilometrage' => 'nullable|max:255',
            'dateimmat' => 'nullable|max:255',
            'photo' => 'nullable|max:5048',
            'equipement' => 'nullable|max:255',
          
        ];
    }
}
