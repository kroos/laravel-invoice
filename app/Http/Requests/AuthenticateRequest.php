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
	public function rules(): array
	{
		return [
 			'username' => 'required|string',
 			'password' => 'required',
 			'remember' => 'bool',
		];
	}

	public function messages(): array
	{
		return [
			'username.required' => 'Your username please',
			'password.required' => 'Your password please',
		];
	}

	public function attributes(): array
	{
		return [
 			'username' => 'Username',
 			'password' => 'Password',
 			'remember' => 'Remember',
		];
	}

}
