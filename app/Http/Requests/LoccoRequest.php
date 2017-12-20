<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoccoRequest extends FormRequest
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
        return [
           'vozilo_id' 		 => 'required',
		   'user_id' 		 => 'required',
		   'relacija' 		 => 'required',
		   'početni_kilometri' 	=> 'required|numeric',
		   'završni_kilometri' 	=> 'required|numeric',
		   'user_id' 		 => 'required',
        ];
    }
	
	public function messages()
	{
		return [
			'vozilo_id.required'	=> 'Unos vozila je obavezan!',
			'user_id.required'	=> 'Unos vozača je obavezan!',
			'relacija.required'	=> 'Unos relacije je obavezan!',
			'početni_kilometri.required'	=> 'Unos početnih kilometara je obavezan!',
			'početni_kilometri.numeric'	=> 'Dozvoljen je unos samo brojeva!',
			'završni_kilometri.required'	=> 'Unos završnih kilometara je obavezan!',
			'završni_kilometri.numeric'	=> 'Dozvoljen je unos samo brojeva!'			
		];
	}
}
