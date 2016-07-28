<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected  $table = 'products';
    protected $fillable = ['name', 'alias','price','intro','keywords','description','image','user_id','cate_id'];
   	public $timestamps = false;

   	public function cate () {
		return $this->belongsTo('App\cate','product_id');
	}

	public function user () {
		return $this->belongsTo('App\User','product_id');
	}
	public function image () {
		return $this->hasMany('App\ProductImages','product_id');
	}
}
