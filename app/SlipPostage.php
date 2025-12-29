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

class SlipPostage extends Model
{
	use SoftDeletes;
	protected $casts = [
		// 'commission' => 'decimal:2',
		// 'retail' => 'decimal:2',
		// 'quantity' => 'decimal:0',
	];


	public function slippostage(): BelongsTo
	{
		return $this->belongsTo(\App\Sales::class, 'id_sales');
	}
}
