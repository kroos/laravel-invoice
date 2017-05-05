<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
	public function users() {
		return $this->hasMany('App\Users', 'id_user');
	}
}
