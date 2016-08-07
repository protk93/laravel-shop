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
use Auth;
use Image;
class ProductController extends Controller
{
    public function getAdd() {
    	$parent = cate::select('name','id','parent_id')->get()->toArray();
		return view ('admin.product.add', compact('parent'));
	}

	public function postAdd(ProductRequest $request) {
		$image = $request->file('fImages');
		//$file_name = $image->getClientOriginalName();
		$extension = $image->getClientOriginalExtension();
		$file_name = FILE_NAME.time().'.'.$extension;
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
		$product ->user_id     = Auth::user()->id;
		$product ->alias       = changeTitle($request->txtName);
        		resize($image,$file_name,'product');
		$image->move($destinationPath, $file_name);
		$product ->save();
		$id = $product->id;
		if (!empty($request->file('fproduct'))) {
		foreach ($request->file('fproduct') as $img) {
			$productDetail = new ProductImages();
			if(!empty($img)) {
				//$image = $img->getClientOriginalName();
				$ran = rand(0,3000);
				$extension = $img->getClientOriginalExtension();
				$image = FILE_NAME.time().$ran.	'.'.$extension;
				$productDetail ->image = $image;
				$productDetail ->product_id = $id;
				$productDetail->save();
				resize($img,$image,'productImage');
				$img->move('resources/upload/product_detail/', $image);
			}
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
			deleteImage($value['image'],'productImage');
			//File::delete('resources/upload/product_detail/'.$value['image']);
		}
		$product = product::findOrFail($id);
		deleteImage($product->image,'product');
		//File::delete('resources/upload/'.$product->image);
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
		            'txtName' => 'required',
		            'txtPrice' => 'required',
		            'fImages' => 'mimes:jpeg,jpg,png',
		            'fproductImg.*' => 'mimes:jpeg,jpg,png',// đối với mảng thì phải dùng *
		            'cateID' => 'required'
		        ],
		['txtName.required' => 'Vui Lòng Nhập tên product',
            		'txtPrice.required' => 'Vui Lòng Nhập gia',
            		'fImages.mimes' => 'vui lòng chọn file ảnh đuôi jpg, jpeg, png',
            		'fproductImg.*.mimes' => 'vui lòng chọn file ảnh đuôi jpg, jpeg, png',
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
		$product ->user_id     = Auth::user()->id;;
		$product ->alias       = changeTitle(Request::input('txtName'));
		if (!empty(Request::file('fImages'))) {
			$image = Request::file('fImages');
			//$file_name = Request::file('fImages')->getClientOriginalName();
			$extension = $image->getClientOriginalExtension();
			$file_name = FILE_NAME.time().'.'.$extension;
			$product ->image       = $file_name;
			resize($image,$file_name,'product');
			Request::file('fImages')->move('resources/upload/', $file_name);
			deleteImage(Request::input('img_current'),'product');
		}
		$product ->save();

		if (!empty(Request::file('fproductImg'))) {
			foreach (Request::file('fproductImg') as $img) {
			$productDetail = new ProductImages();
			if(!empty($img)) {
				$extension = $img->getClientOriginalExtension();
				$ran = rand(0,3000);
				$images = FILE_NAME.time().$ran.'.'.$extension;
				$productDetail ->image = $images;
				$productDetail ->product_id = $id;
				resize($img, $images, 'productImage');
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
				$nameSize100 = "resources/upload/100x130/".$img->image;
				if (File::exists($name )&&File::exists($nameSize100 )){
					File::delete($name);
					File::delete($nameSize100);	
				}
				$img->delete();
			}
			return "ok";
		}
	}
}
