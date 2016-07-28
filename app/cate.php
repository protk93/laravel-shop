<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cate extends Model
{
    protected  $table = 'cates';
    protected $fillable = ['name', 'alias','order','parent_id','keywords','description','status'];
   	public $timestamps = false;

   	public function product () {
		return $this->hasMany('App\product','product_id');
	}


}
