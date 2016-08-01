@extends('admin.master')
@section('content')
@section('title', 'EDIT')
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.blocks.error')
    <form action="{!! route('admin.cate.getEdit',$id) !!}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name = "parentId">
                <option value="0">Please Choose Category</option>
                <?php cate_parent($parent,0,'--',$cate['parent_id']); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{{ old('txtCateName',isset($cate)?$cate['name']:null) }}" />
        </div>
        <div class="form-group">
            <label>Category Order</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{{ old('txtOrder',isset($cate)?$cate['order']:null) }}"/>
        </div>
        <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="txtKeyword" placeholder="Please Enter Category Keywords" value="{{ old('txtCateName',isset($cate)?$cate['keywords']:null) }}"/>
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" name="txtDescription" >{{ old('txtDescription',isset($cate)?$cate['description']:null) }}</textarea>
        </div>
        <div class="form-group">
            <label>Category Status</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" {{ old('rdoStatus',($cate['status'] == 1)?'checked':'') }} type="radio">Visible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="2" {{ old('rdoStatus',($cate['status'] == 2)?'checked':'') }} type="radio">Invisible
            </label>
        </div>
        <button type="submit" class="btn btn-default">Category Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@endsection
