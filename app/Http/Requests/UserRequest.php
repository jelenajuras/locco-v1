<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' 			 => 'required',
			'first_name' 		 => 'required',
			'last_name' 		 => 'required',
			'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6'
			
        ];
    }
	
	public function messages()
	{
		return [
			'email.required'=> 'Unos email adrese je obavezan!',
			'first_name.required'  	 => 'Unos imena je obavezan!',
			'last_name.required' => 'Unos prezimena je obavezan!',
			'email.required' => 'Unos e-maila je obavezan',
			'email.email' => 'Unos mora biti e-mail',
			'email.max' => 'Unos može imati maximalno 255 znakova',
			'email.unique' => 'E-mail već postoji u bazi',
			'password.required' => 'Unos lozinke je obavezan',
			'password.min' => 'Lozinka mora imati više od 6 znakova',
			'password.confirmed' => 'Potrebna je potvrda lozinke'			
		];
	}
}
