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

class ActivityLog extends Model
{
	use SoftDeletes;

	// Disable auditing for this model (to prevent recursive logging)
	protected bool $auditEnabled = false;

	// protected $connection = '';
	protected $table = 'activity_logs';
	// protected $primaryKey = '';
	// public $incrementing = false;
	// protected $keyType = '';
	// const CREATED_AT = '';
	// const UPDATED_AT = '';
	// protected $rememberTokenName = '';

	protected $casts = [
		'changes' => 'array',
		'snapshot' => 'array',
		'meta' => 'array',
		'is_critical' => 'boolean',
	];


	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// set column attribute
	// public function setNameAttribute($value)
	// {
	//     $this->attributes['name'] = ucwords(Str::lower($value));
	// }

	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// relationship
	public function belongstouser(): BelongsTo
	{
		return $this->belongsTo(\App\Models\User::class, 'user_id');
	}

	public function model()
	{
		return $this->morphTo();
	}
}
