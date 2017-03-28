<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	 /**
	  * eloquent relationship
	  * Get the UserGroup record associated with the user.
	  * one to one relationship
	  */
	public function usergroup()
	{
		return $this->belongsTo('App\UserGroup'/*, 'id_group'*/);
	}

	// relationship with transactions model
	public function transaction()
	{
		return $this->hasMany('App\Transactions', 'id_user');
	}

}
