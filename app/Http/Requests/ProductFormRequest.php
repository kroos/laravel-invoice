<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
		//
			'product' => 'required',
			'retail' => 'required|numeric',
			'commission' => 'required|numeric',
			'id_category' => 'required|integer',
			'image' => 'required',		// multiple file validation
			'image.*' => 'image',		// multiple file validation
			'active' => 'integer',
		];
	}
}
// |mimes:jpeg,png,jpg,gif,svg