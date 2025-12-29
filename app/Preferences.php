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

class Preferences extends Model
{
	// use SoftDeletes;
	protected $casts = [
		'company_name' => 'string',
		'company_registration'  => 'string',
		'company_address'  => 'string',
		'company_email'  => 'string',
		'company_tagline'  => 'string',
	];

	public function setcompany_nameAttribute($value)
	{
		$this->attributes['company_name'] = Str::upper(Str::lower($value));
	}

	public function setcompany_addressAttribute($value)
	{
		$this->attributes['company_address'] = Str::title($value);
	}

	public function setcompany_emailAttribute($value)
	{
		$this->attributes['company_email'] = Str::lower($value);
	}

	public function setcompany_taglineAttribute($value)
	{
		$this->attributes['company_tagline'] = Str::title($value);
	}

	public function setcompany_registrationAttribute($value)
	{
		$this->attributes['company_registration'] = Str::upper(Str::lower($value));
	}

	public function compOwner(): BelongsTo
	{
		return $this->BelongsTo(\App\User::class, 'company_owner');
	}

	public function compInCharge(): BelongsTo
	{
		return $this->BelongsTo(\App\User::class, 'company_person_in_charge');
	}
}
