<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CateRequest;
use App\cate;
class CateController extends Controller
{
	public function getAdd() {
		return view ('admin.cate.add');
	}

	public function postAdd(CateRequest $request) {
		$cate = new cate();
		$cate ->name        = $request->txtCateName;
		$cate ->order       = $request->txtOrder;
		$cate ->keywords    = $request->txtKeyword;
		$cate ->description = $request->txtDescription;
		$cate ->parent_id   = $request->parentId;
		$cate ->alias       = $request->txtCateName;
		$cate ->status       = $request->rdoStatus;
		$cate ->save();
		return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>"Add category success!!"]);
	}

	public function getList() {
		return view ('admin.cate.list');
	}
}
