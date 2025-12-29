<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{

	public function authorize()
	{
		return true;
	}

	public function rules(): array
	{
		// dd($this->product['id']);
		return [
			//
			'product' => 'required',
			'retail' => 'required|numeric',
			'commission' => 'required|numeric',
			'id_category' => 'required|integer',
			// 'image' => 'required',      // multiple file validation
			'image' => ['required', 'array', 'min:1'],	// multiple file validation
			'image.*' => 'image|max:5000',       // multiple file validation
			'active' => 'integer',
		];
	}

	public function messages(): array
	{
		return [];
	}

	public function attributes(): array
	{
		return [
			'product' => 'Product',
			'retail' => 'Retail',
			'commission' => 'Commission',
			'id_category' => 'Product Category',
			'image' => 'Image',
			'active' => 'Active',
		];
	}

}
