<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function slippostageimage() {
		return $this->hasOne('App\SlipPostage', 'id_sales');
	}

	public function customer() {
		return $this->hasOne('App\SalesCustomers', 'id_sales');
	}

	public function invitems() {
		return $this->hasMany('App\SalesItems', 'id_sales');
	}

	public function slipnumber() {
		return $this->hasMany('App\SlipNumbers', 'id_sales');
	}

	public function salestaxes() {
		return $this->hasMany('App\SalesTax', 'id_sales');
	}

	public function salespayment() {
		return $this->hasMany('App\Payments', 'id_sales');
	}

	public function invuser() {
		return $this->belongsTo('App\User');
	}
}
