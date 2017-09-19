<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{

	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		// dd($this->product['id']);
		return [
			//
			'product' => 'required',
			'retail' => 'required|numeric',
			'commission' => 'required|numeric',
			'id_category' => 'required|integer',
			// 'image' => 'required',      // multiple file validation
			'image.*' => 'image|max:5000',       // multiple file validation
			'active' => 'integer',
		];
	}
}
