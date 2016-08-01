<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\product;
use App\cate;
use App\Http\Requests\ProductRequest;
use App\ProductImages;
use File;
class ProductController extends Controller
{
    public function getAdd() {
    	$parent = cate::select('name','id','parent_id')->get()->toArray();
		return view ('admin.product.add', compact('parent'));
	}

	public function postAdd(ProductRequest $request) {
		$file_name = $request->file('fImages')->getClientOriginalName();
		$destinationPath = "resources/upload/";
		$product               = new product();
		$product ->name        = $request->txtName;
		$product ->price       = $request->txtPrice;
		$product ->intro       = $request->txtIntro;
		$product ->content     = $request->txtContent;
		$product ->keywords    = $request->txtKeyword;
		$product ->description = $request->txtDescription;
		$product ->image       = $file_name;
		$product ->cate_id     = $request->cateID;
		$product ->user_id     = 1;
		$product ->alias       = changeTitle($request->txtName);
		$request->file('fImages')->move($destinationPath, $file_name);
		$product ->save();
		$id = $product->id;
		foreach ($request->file('fproduct') as $img) {
			$productDetail = new ProductImages();
			if(!empty($img)) {
				$image = time().$img->getClientOriginalName();
				$productDetail ->image = $image;
				$productDetail ->product_id = $id;
				$productDetail->save();
				$img->move('resources/upload/product_detail/', $image);
			}
		}
		return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>"Add product success!!"]);
	}

	public function getList() {

		$product = new product();
		$product = $product->getList();
		return view ('admin.product.list', compact('product'));
	}

	public function getDelete($id) {
		$img = product::find($id)->pimage->toArray();
		foreach ($img as $value) {
			File::delete('resources/upload/product_detail/'.$value['image']);
		}
		$product = product::findOrFail($id);
		File::delete('resources/upload/'.$product->image);
		$product->delete();
		return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>"delete product success!!"]);		
	}

	public function getEdit($id) {
		$product = product::find($id)->toArray();
		$cate = cate::select('name','id','parent_id')->get()->toArray();
		$product_img = product::find($id)->pimage->toArray();
		return view ('admin.product.edit', compact('product','cate','product_img','id'));
	}

	public function postEdit(Request $request, $id) {
		
	}
}
