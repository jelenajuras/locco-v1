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
		   'datum' 			 => 'required',
		   'relacija' 		 => 'required',
		   'pocetni_kilometri' 	=> 'required',
		   'zavrsni_kilometri' 	=> 'required|numeric|greater_than_field:pocetni_kilometri'
        ];
    }
	
	public function messages()
	{
		return [
			'vozilo_id.required'	=> 'Unos vozila je obavezan!',
			'datum.required'	=> 'Unos datuma je obavezan!',
			'user_id.required'	=> 'Unos vozača je obavezan!',
			'relacija.required'	=> 'Unos relacije je obavezan!',
			'pocetni_kilometri.required'	=> 'Unos početnih kilometara je obavezan!',
			'zavrsni_kilometri.required'	=> 'Unos završnih kilometara je obavezan!',
			'zavrsni_kilometri.numeric'	=> 'Dozvoljen je unos samo brojeva!',
			'zavrsni_kilometri.greater_than_field' => 'Završni kilometri ne mogu biti manji od početnih!'				
		];
	}
}
