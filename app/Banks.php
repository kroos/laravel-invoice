<?php
namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Relations\HasOne;
// use Illuminate\Database\Eloquent\Relations\HasOneThrough;
// use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\HasManyThrough;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Support\Str;

class Banks extends Model
{
	// use SoftDeletes;
	protected $casts = [
		'active' => 'boolean',
		'bank' => 'string',
		'city' => 'string',
		'swift_code' => 'string',
		'account' => 'string',
	];

	public function setbankAttribute($value)
	{
	    $this->attributes['bank'] = Str::title($value);
	}

	public function setcityAttribute($value)
	{
	    $this->attributes['city'] = Str::title($value);
	}

	public function setswift_codeAttribute($value)
	{
	    $this->attributes['swift_code'] = Str::upper(Str::lower($value));
	}


	public function payment(): HasMany
	{
		return $this->hasMany(\App\Payments::class, 'id_bank');
	}
}
