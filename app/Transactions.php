<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	// relationship with users model
	public function user()
	{
		return $this->belongsTo('App\Users'/*, 'id_user'*/);
	}

	// relationship with products model
	public function product()
	{
		return $this->belongsTo('App\Products'/*, 'id_product'*/);
	}
}
