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
	    $this->attributes['bank'] = Str::title(Str::lower($value));
	}

	public function setcityAttribute($value)
	{
	    $this->attributes['city'] = Str::title(Str::lower($value));
	}

	public function setswift_codeAttribute($value)
	{
	    $this->attributes['swift_code'] = Str::upper(Str::lower($value));
	}


	public function payment(): HasMany
	{
		return $this->hasMany(\App\Models\Payments::class, 'id_bank');
	}
}
