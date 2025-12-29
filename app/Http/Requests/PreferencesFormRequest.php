<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreferencesFormRequest extends FormRequest
{

	public function authorize()
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'company_name' => 'required',
			'company_registration' => 'required|alpha_dash',
			'company_tagline' => '',
			'logo' => ['required', 'array', 'min:1'],
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

	public function messages(): array
	{
		return [];
	}

	public function attributes(): array
	{
		return [
			'company_name' => 'Company Name',
			'company_registration' => 'Company Registration',
			'company_tagline' => 'Company Tagline',
			'logo.*' => 'Logo',
			'company_address' => 'Company Address',
			'company_postcode' => 'Company Postcode',
			'company_fixed_line' => 'Company Fixed Line',
			'company_mobile' => 'Company Mobile',
			'company_email' => 'Company Email',
			'company_owner' => 'Company Owner',
			'company_person_in_charge' => 'Company Person In Charge',
		];
	}

}
