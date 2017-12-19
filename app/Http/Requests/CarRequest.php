<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'proizvođač' 		 => 'required',
			'model' 			 => 'required',
			'šasija' 			 => 'required',
			'prva_registracija'  => 'required',
			'zadnja_registracija'=> 'required'
        ];
    }
	
	public function messages()
	{
		return [
			'proizvođač.required'=> 'Unos proizvođača je obavezan!',
			'model.required'  	 => 'Unos modela je obavezan!',
			'šasija.required'  	 => 'Unos šasije je obavezan!',
			'prva_registracija'  => 'Unos prvog datuma registracije je obavezan!',
			'zadnja_registracija'=> 'Unos datuma zadnje registracije je obavezan!'
		];
	}
}
