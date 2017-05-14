<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesFormRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		// dd($this->customers['id']);
		return [
			'id_user' => 'required',
			'date_sale' => 'required|date_format:Y-m-d',
			'serial.*.tracking_number' => 'alpha_num',
			'image.*' => 'image|max:5000',
			'repeatcust' => 'required_without_all:client,client_phone',
			'client' => 'required_without:repeatcust|unique:customers,client',
			'client_address' => 'required_with:client_poskod',
			'client_poskod' => 'required_with:client_address',
			'client_phone' => 'required_without:repeatcust|nullable|numeric',
			'client_email' => 'nullable|email',
			'inv.*.id_product' => 'required|integer',
			'inv.*.commission' => 'required|numeric',
			'inv.*.retail' => 'required|numeric',
			'inv.*.quantity' => 'required|integer',
			'tax.*' => 'nullable|integer',
			'pay.*.id_bank' => 'integer|required_with:pay.*.date_payment,pay.*.amount',
			'pay.*.date_payment' => 'date_format:Y-m-d|required_with:pay.*.id_bank,pay.*.amount',
			'pay.*.amount' => 'numeric|required_with:pay.*.id_bank,pay.*.date_payment',
		];
	}

	public function messages()
	{
	    return [
			'inv.required' => 'Please insert product by clicking "Add Products"',
			'image.*.required' => 'Slip postage image is required',
			'serial.*.tracking_number.alpha_num' => 'Receipt or Postage Tracking number can be consists of alphabet and/or digits.',
	    ];
	}
}
