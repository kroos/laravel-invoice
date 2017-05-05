<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageFormRequest extends FormRequest
{

	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		// dd(request('image'));
		return [
			'image' => 'required|image',		// multiple file validation
		];
	}
}
