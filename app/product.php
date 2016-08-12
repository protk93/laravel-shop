<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected  $table = 'products';
    protected $fillable = ['name', 'alias','price','intro','keywords','description','image','user_id','cate_id'];
    public $timestamps = true;

    public function cate () {
            return $this->belongsTo('App\cate');
    }

    public function user () {
            return $this->belongsTo('App\User');
    }

    public function pimage() {
            return $this->hasMany('App\ProductImages');
    }

    public function getList () {
            $product = product::selectRaw('products.id, products.name,  products.price, products.cate_id, products.created_at, cates.name as category_name' )->
                    join('cates' , 'cates.id' ,'=' , 'products.cate_id')->orderBy('products.id','desc')->get()->toArray();
                    return $product;
    }
}
