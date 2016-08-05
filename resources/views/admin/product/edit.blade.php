@extends('admin.master')
@section('content')
@section('title', 'Product <small>Add</small>')
<form name = "fedit" action="{!! url('/admin/product/edit',$id) !!}" method="POST" enctype="multipart/form-data">
<div class="col-lg-7" style="padding-bottom:120px">
@include("admin.blocks.error")
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name ="cateID">
                <option value="">Please Choose Category</option>
                <?php cate_parent($cate,0,'--',$product['cate_id']); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{ old('txtName',isset($product)?$product['name']:null) }}" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{{ old('txtPrice',isset($product)?$product['price']:null) }}"/>
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro">{{ old('txtIntro',isset($product)?$product['intro']:null) }}</textarea>
            <script type="text/javascript">ckeditor ('txtIntro')</script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{{ old('txtContent',isset($product)?$product['content']:null) }}</textarea>
             <script type="text/javascript">ckeditor ('txtContent')</script>
        </div>
        <div class="form-group">
            <label>Images current</label>
            <img src="{!!asset('resources/upload/'.$product['image'])!!}" width="100">
            <input type="hidden" name="img_current" value="{!!$product['image']!!}">
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeyword" placeholder="Please Enter Category Keywords" value="{{ old('txtKeyword',isset($product)?$product['keywords']:null) }}"/>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name= "txtDescription">{{ old('txtDescription',isset($product)?$product['description']:null) }}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
</div>
<div class="col-lg-1"></div>
    <div class="col-lg-4">
    @foreach ($product_img as $key=> $img)
        <div class="form-group" id="hinh{!!$key!!}">
            <img src="{!!asset('resources/upload/product_detail/'.$img['image'])!!}" width="150" height="200" id="hinh{!!$key!!}" data-url =" {!!url('admin/product/del-img')!!}">
            <a href="javascript:void(0)" data-id ="{!! $img['id'] !!}" id="del_img" class="btn btn-danger btn-circle icon-del"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
    @endforeach
        <button type="button" class="btn btn-primary" id="addImages">ADD image</button>
        <div id="insert">
        
        </div>
    </div>  
</form>  
@endsection