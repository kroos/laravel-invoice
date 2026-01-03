<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// auditable model
use App\Traits\Auditable;

// database relationship
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Relations\HasOne;
// use Illuminate\Database\Eloquent\Relations\HasOneThrough;
// use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
// use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Login extends Authenticatable implements MustVerifyEmail
{
	// use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
	use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Auditable;

	// audit
	protected static $auditExclude = ['password','remember_token'];
	protected static $auditIncludeSnapshot = true;
	protected static $auditCriticalEvents = ['updated', 'deleted','force_deleted'];

	// protected $connection = 'mysql';
	protected $table = 'logins';
	// protected $primaryKey = 'id';

	 /**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $guarded = [];
	// protected $fillable = [
	// 	'username',
	// 	// 'email',
	// 	'password',
	// 	'status',
	// ];

	 /**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	 /**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		 // 'email_verified_at' => 'datetime',
		 // 'active' => 'boolean',
		'password' => 'hashed',		// this is because we are using clear text password
	];

	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// db relation hasMany/hasOne

	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// db relation belongsTo
	public function belongstouser(): BelongsTo
	{
		return $this->belongsTo(\App\Models\User::class, 'user_id');
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// no need this anymore cause we choose "logins" for auth, not "users" table anymore. config/auth.php
	// public function getAuthIdentifierName()
	// {
	// 	return 'username';
	// }

	// for password
	// public function getAuthPassword()
	// {
	// 	return $this->password;
	// }

	// custom email reset password in
	// https://laracasts.com/discuss/channels/laravel/how-to-override-the-tomail-function-in-illuminateauthnotificationsresetpasswordphp
	// public function sendPasswordResetNotification($token)
	// {
	// 		$this->notify(new ResetPassword($token));
	// }

	/////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * Get the e-mail address where password reset links are sent.
	 *
	 * @return string
	 */
	public function getEmailForPasswordReset()
	{
		// return $this->email;
		return $this->belongstouser->email;
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// for email Notifiable
	public function routeNotificationForMail($notification)
	{
		return [$this->belongstouser->email => $this->belongstouser->name];
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// used for mustVerifyEmail
	/**
	 * Determine if the user has verified their email address.
	 *
	 * @return bool
	 */
	public function hasVerifiedEmail()
	{
		// return ! is_null($this->email_verified_at);
		return ! is_null($this->belongstouser->email_verified_at);
	}

	/**
	 * Mark the given user's email as verified.
	 *
	 * @return bool
	 */
	public function markEmailAsVerified()
	{
		return $this->belongstouser->forceFill([
			'email_verified_at' => $this->freshTimestamp(),
		])->save();
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////
	// all acl will be done here

	/////////////////////////////////////////////////////////////////////////////////////////////////////
}
