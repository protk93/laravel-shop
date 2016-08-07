<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class IndexController extends Controller
{
	public function index() {
		$product_FE = DB::table('products')->select('name','image','alias','price','id')->orderBy('id','desc')->skip(0)->take(4)->get();
		$product_LS = DB::table('products')->select('name','image','alias','price','id')->orderBy('id','desc')->skip(4)->take(4)->get();
    	return view('user.page.index', compact('product_FE','product_LS'));
	}

    public function productCate($id) {
    	if ($id) {
    		$product = DB::table('products')->select('name','image','alias','price','id','cate_id')->where('cate_id',$id)->orderBy('id','desc')->get();
    		$cate = DB::table('cates')->select('parent_id')->where('id',$id)->first();
    		if ($cate) {
    			$menuCate = DB::table('cates')->select('name','alias','id','parent_id')->where('parent_id',$cate->parent_id)->get();
    			//var_dump($cate);exit;
    		} else {
    			$menuCate = null;
    		}
    	}
    	$lastedProduct = DB::table('products')
					    	->join('cates', 'cates.id', '=', 'products.cate_id')
					    	->select('products.*','cates.name as cateName')
					    	->orderBy('products.id','desc')->skip(0)->take(3)->get();
    	return view('user.page.category', compact('product','menuCate','lastedProduct'));
	}

	public function productDetail($id) {
	       if ($id) {
                        $product = DB::table('products')->where('id',$id)->first();
                        $image = DB::table('product_images')->select('id','image')->where('product_id',$id )->get();
                        
	       }
		
    	return view('user.page.product', compact('product','image'));
	}
}
