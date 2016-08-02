<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\product;
use App\cate;
use App\Http\Requests\ProductRequest;
use App\ProductImages;
use File;
use Validator;
//use Input;
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
	 	$validator = Validator::make(Request::all(), [
            'txtName' => 'required|unique:products,name',
            'txtPrice' => 'required',
            'fImages' => 'image',
            'cateID' => 'required'
        ],
		['txtName.required' => 'Vui Lòng Nhập tên product',
            'txtName.unique' => 'product đã tồn tại',
            'txtPrice.required' => 'Vui Lòng Nhập gia',
            'fImages.image' => 'vui lòng chọn file ảnh',
            'cateID.required' => 'Vui Lòng chọn category',]
        );
		if ($validator->fails()) {
            return redirect()->route('admin.product.getEdit',$id)
                        ->withErrors($validator)
                        ->withInput();
        }
		$product = product::find($id);
		$product ->name        = Request::input('txtName');
		$product ->price       = Request::input('txtPrice');
		$product ->intro       = Request::input('txtIntro');
		$product ->content     = Request::input('txtContent');
		$product ->keywords    = Request::input('txtKeyword');
		$product ->description = Request::input('txtDescription');
		$product ->cate_id     = Request::input('cateID');
		$product ->user_id     = 1;
		$product ->alias       = changeTitle(Request::input('txtName'));
		if (!empty(Request::file('fImages'))) {
			$file_name = Request::file('fImages')->getClientOriginalName();
			$product ->image       = $file_name;
			Request::file('fImages')->move('resources/upload/', $file_name);
			$img = "resources/upload/".Request::input('img_current');
			if (File::exists($img)){
				File::delete($img);
			}
		}
		$product ->save();

		if (!empty(Request::file('fproductImg'))) {
			foreach (Request::file('fproductImg') as $img) {
			$productDetail = new ProductImages();
			if(!empty($img)) {
				$images = time().$img->getClientOriginalName();
				$productDetail ->image = $images;
				$productDetail ->product_id = $id;
				$img->move('resources/upload/product_detail/', $images);
				$productDetail->save();
			}
			
			}
		}
		return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>"Edit product success!!"]);	
		
	}
	public function getDelImg ($id) {
		if (Request::ajax()) {
			$id = (int)Request::get('idHinh');
			$img = ProductImages::find($id);
			if (!empty($img)) {
				$name = "resources/upload/product_detail/".$img->image;
				if (File::exists($name)){
					File::delete($name);	
				}
				$img->delete();
			}
			return "ok";
		}
	}
}
