@extends('admin.master')
@section('content')
@section('title', 'Product <small>Add</small>')
<form action="{!! url('/admin/product/add') !!}" method="POST" enctype="multipart/form-data">
<div class="col-lg-7" style="padding-bottom:120px">
    @include("admin.blocks.error")
   
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name ="cateID">
                <option value="">Please Choose Category</option>
                <?php cate_parent($parent,0,'--',old('cateID')); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter name" value="{!!old('txtName')!!}" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" type="number" placeholder=" Please Enter price" value="{!!old('txtPrice')!!}" />
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro">{!!old('txtIntro')!!} </textarea>
            <script type="text/javascript">ckeditor ('txtIntro')</script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{!!old('txtContent') !!}</textarea>
            <script type="text/javascript">ckeditor ('txtContent')</script>
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeyword" placeholder="Please Enter Category Keywords" value="{!!old('txtKeyword')!!}"/>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDescription">{!!old('txtDescription') !!}</textarea>
        </div>
       
        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
        
        </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-4">
    @for ($i = 1; $i<=10; $i++)

        <div class="form-group">
        <label>Product image detail {!!$i!!}</label>
        <input type="file" name="fproduct[]">
        </div>
    @endfor
    </div>  
</form>             
@endsection