<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected  $table = 'user_groups';
    protected $fillable = ['name', 'note'];
    public $timestamps = false;
    
    public function user () {
        return $this->hasMany('App\User');
    }
    
}
