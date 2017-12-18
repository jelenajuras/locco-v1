<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'id'          => 'required|min:4',
			'customer_id' => 'required',
			'naziv'       => 'required'
        ];
    }
	
	public function messages()
	{
		return [
			'id.required' 		   => 'Unos broja projekta je obavezan!',
			'id.min' 		   	   => 'Broj projekta mora imati minimalno 4 znamenke!',
			'customer_id.required' => 'Unos naručitelja je obavezan!',
			'naziv.required'       => 'Unos naziva projekta je obavezan!',
		];
	}
}
