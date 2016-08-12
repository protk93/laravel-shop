<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Hash;
use App\User;
use App\UserGroup;
use Auth;
class UserController extends Controller
{
    	public function getAdd() {
            //chuyển id=>key và value là name
            $userGroup = UserGroup::all()->lists('name', 'id')->toArray();
            return view ('admin.user.add', compact('userGroup'));
	}

	public function postAdd(UserRequest $request) {
		$user            = new User();
		$user ->username = $request->txtUser;
		$user ->password = Hash::make($request->txtPass);
		$user ->email    = $request->txtEmail;
                $user ->group_id    = $request->groupId;
		$user ->remember_token    = $request->_token;
		$user ->status    = $request->status;
		$user->save();
		return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>"Add user success!!"]);
	}

	public function getList() {
		$user = User::select('users.id','users.username','users.group_id','users.email','users.status','user_groups.name')
                        ->join('user_groups' , 'user_groups.id' ,'=' , 'users.group_id')
                        ->orderBy('id','desc')->get()->toArray();
		return view ('admin.user.list', compact('user'));
	}

	public function getDelete($id) {
		$user_current_id = Auth::user()->group_id;	
		$user = User::find($id);
		if ($id == 4 || ($user_current_id != 4 && $user->level == 1)) {
			return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>"sorry !! you can't access change status user"]);
		} else {
                    if ($user->status == 1) {
                        $user ->status = 0;
                    } else {
                        $user ->status = 1;
                    }
			$user->save();
		}
		return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>"change status user success!!"]);
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
