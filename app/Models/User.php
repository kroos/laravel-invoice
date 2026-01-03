<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

// load sluggable
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

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
		public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'name'
			]
		];
	}

	public function getRouteKeyName()
	{
		return 'slug';
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// db relation hasMany/hasOne
	public function usergroup(): BelongsTo
	{
		return $this->belongsTo(\App\Models\UserGroup::class, 'id_group');
	}

	public function userInvoices(): HasMany
	{
		return $this->hasMany(\App\Models\Sales::class, 'id_user');
	}

	public function createdby(): HasMany
	{
		return $this->hasMany(\App\Models\Product::class, 'id_user');
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// this is for middleware truly for an admin purpose
	public function isAdmin() {
		// dd(\Auth::user()->id_group);
		if ( \Auth::user()->id_group == 1 ) {
			return true;
		}
		return false;
	}

	// invoice item can only be edited by its respective owner and Admin ONLY
	public function Owner( $id )
	{
		// dd($id);
		if ( \Auth::user()->id_group == 2 && \Auth::user()->id == $id ) {
		 return true;
		} else {
			// give access for admin
			if ( \Auth::user()->id_group == 1 ) {
				return true;
			}
		}
		return false;
	}

	// no one can edit user bio except by him/herself ant the admin
	// public function notUser( $id ) {
	// 	if ( auth()->user()->id == $id ) {
	// 		return true;
	// 	} else {
	// 		if ( auth()->user()->id_group == 1 ) {
	// 			return true;
	// 		} else {
	// 			return false;
	// 		}
	// 	}
	// }

	/////////////////////////////////////////////////////////////////////////////////////////////////////
}
