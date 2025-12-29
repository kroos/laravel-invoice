<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
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
			'email' => 'required|email',
		];
	}

	public function messages(): array
	{
		return [
			'email.required' => 'Your email please',
		];
	}

	public function attributes(): array
	{
		return [
			'email' => 'Email',
		];
	}

}
