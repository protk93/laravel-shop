@extends('admin.master')
@section('content')
@section('title', 'User <small>Edit</small>')
<div class="col-lg-7" style="padding-bottom:120px">
@include("admin.blocks.error")
    <form action="{!!route('admin.user.getEdit', $id)!!}" method="POST">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="txtUser" value="{{ old('txtUser',isset($user)?$user['username']:null) }}" disabled />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
        </div>
        <div class="form-group">
            <label>RePassword</label>
            <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{{ old('txtEmail',isset($user)?$user['email']:null) }}" />
        </div>
        <div class="form-group">
            <label>Status</label>
            <label class="radio-inline">
                <input name="status" value="1" {{($user['status']==1?"checked":null)}} type="radio">Active
            </label>
            <label class="radio-inline">
                <input name="status" value="0" {{($user['status']==0?"checked":null)}} type="radio">InActive
            </label>
        </div>
        <div class="form-group">
            <label>User Level</label>
            <label class="radio-inline">
                <input name="rdoLevel" value="1" {{($user['level']==1?"checked":null)}} type="radio">Admin
            </label>
            <label class="radio-inline">
                <input name="rdoLevel" value="2" {{($user['level']==2?"checked":null)}} type="radio">Member
            </label>
        </div>
        <button type="submit" class="btn btn-default">User Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection