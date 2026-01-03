<?php
namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use App\Models\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Relations\HasOne;
// use Illuminate\Database\Eloquent\Relations\HasOneThrough;
// use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\HasManyThrough;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// load helper
use Illuminate\Support\Str;

class ProductCategory extends Model
{
	// use SoftDeletes;
	protected $casts = [
		'active' => 'boolean',
		'product_category' => 'string',
	];

#####################################################################################
	// public function setproduct_categoryAttribute($value)
	// {
	// 	$this->attributes['product_category'] = Str::title(Str::lower($value));
	// }

#####################################################################################

	// relationship with product table
	public function product(): HasMany
	{
		return $this->hasMany(\App\Models\Product::class, 'id_category');
	}
}
