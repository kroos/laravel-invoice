<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    // relationship with product table
    public function product()
    {
    	return $this->hasMany('App\Product', 'id_category');
    }
}
