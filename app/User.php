<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id_group',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function usergroup()
    {
        return $this->belongsTo('App\UserGroup'/*, 'id_group'*/);
    }

    public function userInvoices()
    {
        return $this->hasMany('App\Sales', 'id_user');
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
}
