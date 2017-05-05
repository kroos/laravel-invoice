<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SlipPostage extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function slippostage() {
		return $this->belongsTo('App\Sales');
	}
}
