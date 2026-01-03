<?php
namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use App\Models\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Relations\HasOne;
// use Illuminate\Database\Eloquent\Relations\HasOneThrough;
// use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
// use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// load helper
use Illuminate\Support\Str;

class ProductImage extends Model
{
    // use SoftDeletes;
    protected $casts = [
        // 'active' => 'boolean',
        // 'company_email' => 'email',
    ];

#####################################################################################
	// public function setproduct_categoryAttribute($value)
	// {
	// 	$this->attributes['product_category'] = Str::title(Str::lower($value));
	// }

#####################################################################################
	public function product(): BelongsTo
	{
		return $this->belongsTo(\App\Models\Product::class, 'id_product');
	}
}
