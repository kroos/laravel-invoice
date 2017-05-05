<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class SalesTax extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function salestax() {
		return $this->belongsTo('App\Sales');
	}

	public function tax() {
		return $this->belongsTo('App\Taxes');
	}
}
