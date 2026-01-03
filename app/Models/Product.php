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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// load helper
use Illuminate\Support\Str;

// load sluggable
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Product extends Model
{
	use Sluggable;
	protected $casts = [
		'product' => 'string',
		'slug' => 'string',
		'retail' => 'decimal:2',
		'commission' => 'decimal:2',
		'active' => 'boolean',
	];

	public function sluggable(): array
	{
		return [
			'slug' => ['source' => 'product']
		];
	}

	public function getRouteKeyName()
	{
		return 'slug';
	}

#####################################################################################
	public function setproductAttribute($value)
	{
		$this->attributes['product'] = Str::title(Str::lower($value));
	}

#####################################################################################

	public function productimage(): HasMany
	{
		return $this->hasMany(\App\Models\ProductImage::class, 'id_product');
	}

	public function category(): BelongsTo
	{
		return $this->belongsTo(\App\Models\ProductCategory::class, 'id_category');
	}

	public function salesitem(): HasMany
	{
		return $this->hasMany(\App\Models\SalesItem::class, 'id_product');
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(\App\Models\User::class, 'id_user');
	}
}
