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

// load sluggable
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Taxes extends Model
{
	use SoftDeletes, Sluggable;
	protected $casts = [
		'tax' => 'string',
		'amount' => 'decimal:2',
	];

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

#####################################################################################
	public function settaxAttribute($value)
	{
		$this->attributes['tax'] = Str::upper(Str::lower($value));
	}

#####################################################################################
	public function taxessales(): HasMany
	{
		return $this->hasMany(\App\Models\Sales::class, 'id_sales');
	}
}
