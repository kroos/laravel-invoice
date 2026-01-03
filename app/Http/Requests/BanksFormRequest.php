<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BanksFormRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules(): array
	{
		// dd($this->banks['id']);
		return [
			'bank' => 'required',
			'city' => 'required',
			'swift_code' => [
												'required',
												'alpha',
												Rule::unique('banks', 'swift_code')->ignore($this->route('banks'))
											],
			'account' => 'nullable|alpha_dash',
			'active' => 'nullable'
		];
	}
	public function messages(): array
	{
		return [];
	}

	public function attributes(): array
	{
		return [
			'bank' => 'Bank',
			'city' => 'City',
			'swift_code' => 'Swift Code',
			'account' => 'Account',
			'active' => 'Active'
		];
	}

}
