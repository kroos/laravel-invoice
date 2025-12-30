<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class TaxesFormRequest extends FormRequest
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
			'tax' => ['required', 'alpha', Rule::unique('taxes', 'tax')->ignore($this->route('taxes'), 'slug')],
			'amount' => 'required|numeric',
		];
	}

	public function messages(): array
	{
		return [];
	}

	public function attributes(): array
	{
		return [
			'tax' => 'Tax',
			'amount' => 'Tax Amount',
		];
	}

}
