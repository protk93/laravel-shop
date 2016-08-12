
@extends('admin.master')
@section('content')
@section('title', 'User <small>Add</small>')

<div class="col-lg-7" style="padding-bottom:120px">
 @include("admin.blocks.error")
    <form action="" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="txtUser" placeholder="Please Enter Username" value="{!!old('txtUser')!!}"/>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password"  />
        </div>
        <div class="form-group">
            <label>RePassword</label>
            <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword"  />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{!!old('txtEmail')!!}" />
        </div>
        <div class="form-group">
            <label>Status</label>
            <label class="radio-inline">
                <input name="status" value="1" checked="" type="radio">Active
            </label>
            <label class="radio-inline">
                <input name="status" value="0" type="radio">InActive
            </label>
        </div>
        <div class="form-group">
            <label>User Group</label>
            <select class="form-control" name ="groupId">
                <option value="0">Please Choose Group</option>
                @foreach ($userGroup as $key=> $item)
                <option value="{!!$key!!}">{!!$item!!}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-default">User Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@endsection