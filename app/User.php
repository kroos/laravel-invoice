<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// load sluggable
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class User extends Authenticatable
{
    use Sluggable;
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

    use Notifiable;

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

    public function usergroup()
    {
        return $this->belongsTo('App\UserGroup'/*, 'id_group'*/);
    }

    public function userInvoices()
    {
        return $this->hasMany('App\Sales', 'id_user');
    }

    public function createdby()
    {
        return $this->hasMany('App\Product', 'id_user');
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
