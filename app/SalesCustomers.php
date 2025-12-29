<?php
namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Model;

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

class SalesCustomers extends Model
{
	use SoftDeletes;
	protected $casts = [
		// 'date_sale' => 'date',
	];

#####################################################################################
	// public function setproduct_categoryAttribute($value)
	// {
	// 	$this->attributes['product_category'] = Str::title($value);
	// }

#####################################################################################

	public function salescustomers(): BelongsTo
	{
		return $this->belongsTo(\App\Customers::class, 'id_customer');
	}

	public function sales(): BelongsTo
	{
		return $this->belongsTo(\App\Sales::class, 'id_sales');
	}
}
