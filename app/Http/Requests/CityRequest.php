<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'id' 	=> 'required|min:5',
			'grad'  => 'required'
        ];
    }
	
	public function messages()
	{
		return [
			'id.required'	 => 'Unos poštanskog broja je obavezan!',
			'id.min'	 => 'Poštanski broja treba imati minimalno 5 brojeva!',
			'grad.required'  => 'Unos grada je obavezan!'
		];
	}
}
