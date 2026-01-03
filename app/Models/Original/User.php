<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


// auditable model
use App\Traits\Auditable;

// load helper
use Illuminate\Support\Str;

// db relation class to load
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Relations\HasOne;
// use Illuminate\Database\Eloquent\Relations\HasOneThrough;
// use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\HasManyThrough;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements MustVerifyEmail
{
	// notify can be done on User model too
	use HasApiTokens, HasFactory, Notifiable, /*SoftDeletes, */Auditable;


	// audit
	protected static $auditExclude = ['password','remember_token'];
	protected static $auditIncludeSnapshot = true;
	protected static $auditCriticalEvents = ['create', 'updated', 'deleted'/*,'force_deleted'*/];

	// protected $connection = 'mysql';
	protected $table = 'users';
	// protected $dates = ['deleted_at'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var list<string>
	 */
	// protected $fillable = [
	// 	'name',
	// 	'email',
	// 	'password',
	// ];

	protected $guarded = [];

	 /**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		// 'active' => 'boolean',
	];

	/////////////////////////////////////////////////////////////////////////////////////////////////////
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = Str::title(Str::lower($value));
	}

	public function setEmailAttribute($value)
	{
		$this->attributes['email'] = Str::lower($value);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// db relation hasMany/hasOne
	// public function hasmanylogin(): HasMany
	// {
	// 	return $this->hasMany(Login::class, 'user_id');
	// }

	/////////////////////////////////////////////////////////////////////////////////////////////////////

}
