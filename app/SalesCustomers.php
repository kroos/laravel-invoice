<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SalesCustomers extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function salescustomers() {
		return $this->belongsTo('App\Customers');
	}

	public function customerssales() {
		return $this->belongsTo('App\Sales');
	}
}
