<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CateRequest;
use App\cate;
class CateController extends Controller
{
	public function getAdd() {
		$parent = cate::select('name','id','parent_id')->get()->toArray();
		return view ('admin.cate.add',compact('parent'));
	}

	public function postAdd(CateRequest $request) {
		$cate = new cate();
		$cate ->name        = $request->txtCateName;
		$cate ->order       = $request->txtOrder;
		$cate ->keywords    = $request->txtKeyword;
		$cate ->description = $request->txtDescription;
		$cate ->parent_id   = $request->parentId;
		$cate ->alias       = changeTitle($request->txtCateName);
		$cate ->status       = $request->rdoStatus;
		$cate ->save();
		return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>"Add category success!!"]);
	}

	public function getList() {
		$data = cate::select('name','id','parent_id','status')->orderBy('id', 'desc')->get()->toArray();
		return view ('admin.cate.list', compact('data'));
	}
}
