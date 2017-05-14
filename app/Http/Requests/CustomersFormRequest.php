<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomersFormRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	 public function rules()
	{
		return [
			'client' => 'required_without:repeatcust|unique:customers,client,'.$this->customers['id'],
			'client_address' => 'required_with:client_poskod',
			'client_poskod' => 'required_with:client_address',
			'client_phone' => 'required_without:repeatcust|nullable|numeric|min:10|unique:customers,client_phone,'.$this->customers['id'],
			'client_email' => 'required_without:repeatcust|nullable|email|unique:customers,client_email,'.$this->customers['id'],
		];
	}
}
