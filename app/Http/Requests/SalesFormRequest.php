<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesFormRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules(): array
	{
		// dd($this->customers['id']);
		return [
			'id_user' => 'required',
			'date_sale' => 'required|date_format:Y-m-d',
			'serial' => ['required', 'array', 'min:1'],
			'serial.*.tracking_number' => 'alpha_num',
			'image' => ['required', 'array', 'min:1'],
			'image.*' => 'image|max:5000',
			'repeatcust' => 'required_without_all:client,client_phone',
			'client' => 'required_without:repeatcust|unique:customers,client',
			'client_address' => 'required_with:client_poskod',
			'client_poskod' => 'required_with:client_address',
			'client_phone' => 'required_without:repeatcust|nullable|numeric',
			'client_email' => 'nullable|email',
			'inv' => ['required', 'array', 'min:1'],
			'inv.*.id_product' => 'required|integer',
			'inv.*.commission' => 'required|numeric',
			'inv.*.retail' => 'required|numeric',
			'inv.*.quantity' => 'required|integer',
			'tax' => 'nullable|integer',
			'tax.*' => 'nullable|integer',
			'pay' => ['required', 'array', 'min:1'],
			'pay.*.id_bank' => 'integer|required_with:pay.*.date_payment,pay.*.amount',
			'pay.*.date_payment' => 'date_format:Y-m-d|required_with:pay.*.id_bank,pay.*.amount',
			'pay.*.amount' => 'numeric|required_with:pay.*.id_bank,pay.*.date_payment',
		];
	}

	public function messages(): array
	{
	    return [
			'inv.required' => 'Please insert product by clicking "Add Products"',
			'image.*.required' => 'Slip postage image is required',
			'serial.*.tracking_number.alpha_num' => 'Receipt or Postage Tracking number can be consists of alphabet and/or digits.',
	    ];
	}

	public function attributes(): array
	{
		return [
			'id_user' => 'Merchandiser',
			'date_sale' => 'Date Sale',
			'serial' => 'Slip Postage/Receipt',
			'serial.*.tracking_number' => 'Tracking Number',
			'image' => 'Slip Postage/Receipt Image',
			'image.*' => 'image',
			'repeatcust' => 'Customer',
			'client' => 'Customer',
			'client_address' => 'Customer Address',
			'client_poskod' => 'Customer Poskod',
			'client_phone' => 'Customer Phone',
			'client_email' => 'Customer Email',
			'inv' => 'Product List',
			'inv.*.id_product' => 'Product',
			'inv.*.commission' => 'Product Commission',
			'inv.*.retail' => 'Product Retail',
			'inv.*.quantity' => 'Product Quantity',
			'tax' => 'Tax',
			'tax.*' => '',
			'pay' => 'Payment',
			'pay.*.id_bank' => 'Payment Bank',
			'pay.*.date_payment' => 'Payment Date',
			'pay.*.amount' => 'Payment Amount',
		];
	}

}
