<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticateRequest extends FormRequest
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
 			'username' => 'required|string',
 			'password' => 'required',
 			'remember' => 'bool',
		];
	}

	public function messages()
	{
		return [
			'email.required' => 'your email please',
			'password.required' => 'your password please',
		];
	}

}
