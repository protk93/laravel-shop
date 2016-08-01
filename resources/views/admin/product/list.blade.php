@extends('admin.master')
@section('content')
@section('title', 'Product <small>List</small>')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Date</th>
            <th>category</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    @foreach ($product as $item)
        <?php $i++;?>
        <tr class="odd gradeX" align="center">
            <td>{{$i}}</td>
            <td>{{$item['name']}}</td>
            <td>{{number_format($item['price']) }} VNĐ</td>
            <td>
                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans()}}
            </td>
            <td>{{$item['category_name']}}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.product.getDelete',$item['id'])}}" onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.product.getEdit',$item['id'])}}">Edit</a></td>
        </tr>
    @endforeach 
        

    </tbody>
</table>
@endsection