<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreferencesFormRequest extends FormRequest
{
	
	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		return [
			'company_name' => 'required',
			'company_registration' => 'required|alpha_dash',
			'company_tagline' => '',
			'logo.*' => 'image|max:5000',
			'company_address' => 'required',
			'company_postcode' => 'numeric',
			'company_fixed_line' => 'numeric',
			'company_mobile' => 'numeric',
			'company_email' => 'email',
			'company_owner' => 'required',
			'company_person_in-charge' => 'required',
		];
	}
}
