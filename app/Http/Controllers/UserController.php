<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Hash;
use App\User;
class UserController extends Controller
{
    public function getAdd() {
    	return view ('admin.user.add');
	}

	public function postAdd(UserRequest $request) {
		$user            = new User();
		$user ->username = $request->txtUser;
		$user ->password = Hash::make($request->txtPass);
		$user ->email    = $request->txtEmail;
		$user ->level    = $request->rdoLevel;
		$user ->remember_token    = $request->_token;
		$user->save();
		return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>"Add user success!!"]);
	}

	public function getList() {
		return view ('admin.user.list');
	}

	public function getDelete($id) {
		
	}

	public function getEdit($id) {
		
	}

	public function postEdit(Request $request, $id) {
		
		
	}
}
