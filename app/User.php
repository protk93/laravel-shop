<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected  $table = 'users';

    public function product () {
        return $this->hasMany('App\product','product_id');
    }
    
    public function UserGroup () {
            return $this->belongsTo('App\UserGroup');
    }
}
