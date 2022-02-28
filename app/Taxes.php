<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

// load sluggable
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Taxes extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

    use Sluggable;
    public function sluggable(): array
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

	public function taxessales() {
		return $this->hasMany('App\Sales', 'id_sales');
	}
}
