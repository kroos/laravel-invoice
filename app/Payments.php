<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payments extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function pay() {
		return $this->belongsTo('App\Sales');
	}
}
