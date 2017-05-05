<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class SalesItems extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function itemsale() {
		return $this->belongsTo('App\Sales');
	}

	public function product() {
		return $this->belongsTo('App\Product');
	}
}
