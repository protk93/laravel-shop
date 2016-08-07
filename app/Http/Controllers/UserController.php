<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Hash;
use App\User;
use Auth;
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
		$user ->status    = $request->status;
		$user->save();
		return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>"Add user success!!"]);
	}

	public function getList() {
		$user = User::select('id','username','level','email','status')->orderBy('id','desc')->get()->toArray();
		return view ('admin.user.list', compact('user'));
	}

	public function getDelete($id) {
		$user_current_id = Auth::user()->id;	
		$user = User::find($id);
		if ($id == 4 || ($user_current_id != 4 && $user->level == 1)) {
			return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>"sorry !! you can't access delete user"]);
		} else {
			$user->delete();
		}
		return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>"Delete user success!!"]);
	}

	public function getEdit($id) {
		$user_current_id = Auth::user()->id;
		$user = User::find($id)->toArray();
		if(($user_current_id != 4)&& ($id == 4 || ($user['level'] == 1 && $user_current_id !=$id )) )
		{
			return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>"sorry !! you can't access edit user"]);
		}
		return view ('admin.user.edit', compact('user','id'));
	}

	public function postEdit(Request $request, $id) {
		$user = User::find($id);
		if ($request->txtPass) {
			$this->validate($request,
				[
					'txtPass' => 'same:txtRePass'
				],
				[
					'txtPass.same' => 'Two pass no same'
				]
			);
			$pass = $request->txtPass;
			$user->password = Hash::make($pass);
		} 
		$this->validate($request,
			[
				'txtEmail' => 'required|email'
			],
			[
				'txtEmail.required' => 'Please input email',
				'txtEmail.email' => 'Email is invalid'
			]
		);
		$user->email = $request->txtEmail;
		$user ->remember_token    = $request->_token;
		$user ->level    = $request->rdoLevel;
		$user ->status    = $request->status;
		$user->save();
		return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>"Edit user success!!"]);		
	}

}
