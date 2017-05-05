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
		// dd($request->all());
		return [
			'id_user' => 'required',
			'date_sale' => 'required|date_format:Y-m-d',
			'serial.*.tracking_number' => 'alpha_num',
			'image.*' => 'image|max:5000',
			'client' => 'required',
			'client_address' => 'required_with:client_poskod',
			'client_poskod' => 'required_with:client_address',
			'client_phone' => 'required|numeric',
			'client_email' => 'required|email',
			'inv.*.id_product' => 'integer',
			'inv.*.commission' => 'numeric',
			'inv.*.retail' => 'numeric',
			'inv.*.quantity' => 'integer',
			'tax.*' => 'nullable',
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
