<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

// load sluggable
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Product extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'taxes'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

#####################################################################################

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
