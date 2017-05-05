<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function productimage() {
		return $this->hasMany('App\ProductImage', 'id_product');
	}

	public function category() {
		return $this->belongsTo('App\ProductCategory');
	}

	public function transaction()
	{
		return $this->hasMany('App\Transactions', 'id_user');
	}
}
