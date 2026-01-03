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

class Payments extends Model
{
	// use SoftDeletes;
	protected $casts = [
		'date_payment' => 'date',
		'amount' => 'decimal:2',
	];

	public function pay(): BelongsTo
	{
		return $this->belongsTo(\App\Models\Sales::class, 'id_sales');
	}

	public function bank(): BelongsTo
	{
		return $this->belongsTo(\App\Models\Banks::class, 'id_bank');
	}
}
