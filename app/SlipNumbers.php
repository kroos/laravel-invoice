<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class SlipNumbers extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function slipnumbers() {
		return $this->belongsTo('App\Sales');
	}
}
