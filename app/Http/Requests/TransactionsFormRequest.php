<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionsFormRequest extends FormRequest
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
			'commission_on' => 'required',
			'id_product' => 'required|integer',
			'retail' => 'required|numeric',
			'commission' => 'required|numeric',
			'quantity' => 'required|integer|min:1',
		];
	}

	public function messages()
	{
	    return [
			'commission_on.required' => 'Insert commission month',
			'id_product.required' => 'Product is required',
			'retail.required' => 'Price Retail pleaseee...',
			'commission.required' => 'You dont need your commission, don\'t you? :)',
			'quantity.required' => 'how many did you sell for this month?',
	    ];
	}
}
