<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function custsale() {
		return $this->belongsTo('App\Sales');
	}
}
