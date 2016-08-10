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
		$cate ->status      = $request->rdoStatus;
		$cate ->save();
		return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>"Add category success!!"]);
	}

	public function getList() {
		$data = cate::select('name','id','parent_id','status')->get()->toArray();
		return view ('admin.cate.list', compact('data'));
	}

	public function getDelete($id) {
		$parent = cate::where('parent_id',$id)->count();
		if (empty($parent)) {
			$cate = cate::findOrFail($id);
                        if ($cate->status == 1) {
                            $cate ->status = 0;
                        } else {
                            $cate ->status = 1;
                        }
			$cate->save();
			return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>"change status category success!!"]);
		} else {
			return redirect()->route('admin.cate.list')->with(['flash_level'=>'danger','flash_message'=>"delete fail !! sorry, you can't delete"]);
		}
		
	}

	public function getEdit($id) {
		$cate = cate::find($id)->toArray();
		$parent = cate::select('name','id','parent_id')->get()->toArray();
		return view ('admin.cate.edit', compact('cate','parent','id'));
	}

	public function postEdit(Request $request, $id) {
		$this->validate($request, 
			['txtCateName' => 'required',],
			['txtCateName.required' => 'Vui Lòng Nhập tên category',]
		);
		$cate = cate::find($id);
		$cate ->name        = $request->txtCateName;
		$cate ->order       = $request->txtOrder;
		$cate ->keywords    = $request->txtKeyword;
		$cate ->description = $request->txtDescription;
		$cate ->parent_id   = $request->parentId;
		$cate ->alias       = changeTitle($request->txtCateName);
		$cate ->status      = $request->rdoStatus;
		$cate ->save();
		return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>"Edit category success!!"]);
	}
}
