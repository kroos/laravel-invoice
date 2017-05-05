<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Taxes extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function taxessales() {
		return $this->hasMany('App\Sales', 'id_sales');
	}
}
