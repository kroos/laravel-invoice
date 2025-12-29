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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// load helper
use Illuminate\Support\Str;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// load sluggable
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class User extends Authenticatable
{
	use Sluggable;
	protected $casts = [
		'name' => 'string',
		'slug' => 'string',
		'username' => 'string',
		'email' => 'string',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

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

#####################################################################################
	public function setnameAttribute($value)
	{
		$this->attributes['name'] = Str::title($value);
	}

	public function setusernameAttribute($value)
	{
		$this->attributes['username'] = Str::lower($value);
	}

	public function setemailAttribute($value)
	{
		$this->attributes['email'] = Str::lower($value);
	}

#####################################################################################
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'username', 'email', 'password', 'id_group', 'color',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function usergroup(): BelongsTo
	{
		return $this->belongsTo(\App\UserGroup::class, 'id_group');
	}

	public function userInvoices(): HasMany
	{
		return $this->hasMany(\App\Sales::class, 'id_user');
	}

	public function createdby(): HasMany
	{
		return $this->hasMany(\App\Product::class, 'id_user');
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////
	// this is for middleware truly for an admin purpose
	public function isAnAdmin() {
		// dd(auth()->user()->id_group);
		if ( auth()->user()->id_group == 1 ) {
			return true;
		} else {
			return false;
		}
	}

	// invoice item can only be edited by its respective owner and Admin ONLY
	public function OwnerOfThisItem( $id )
	{
		// dd($id);
		if ( auth()->user()->id_group == 2 && auth()->user()->id == $id ) {
		 return true;
		} else {
			// give access for admin
			if ( auth()->user()->id_group == 1 ) {
				return true;
			} else {
				return false;
			}
		}
	}

	// no one can edit user bio except by him/herself ant the admin
	public function notUser( $id ) {
		if ( auth()->user()->id == $id ) {
			return true;
		} else {
			if ( auth()->user()->id_group == 1 ) {
				return true;
			} else {
				return false;
			}
		}
	}

}
