<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryFormRequest extends FormRequest
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
		// dd($this->productCategory['id']);
		return [
			'category' => 'required|unique:product_categories,product_category,'.$this->productCategory['id'].'|alpha',  // '.$this->categories['id']' to ignore for the update process
			'active' => 'integer',
		];
	}
}
