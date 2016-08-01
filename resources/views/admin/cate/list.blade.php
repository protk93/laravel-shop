@extends('admin.master')
@section('content')
@section('title', 'List')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Category Parent</th>
            <th>Status</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    @foreach ($data as $key => $value)
    <?php $i++ ?>
        <tr class="odd gradeX" align="center">
            <td>{{$i}}</td>
            <td>{{$value['name']}}</td>
            <td>
                @if($value['parent_id'])
                    <?php
                        $parent = DB::table('cates')->where("id",$value['parent_id'])->first();
                        echo $parent->name;
                    ?>
                @else
                    {{"None"}}
                @endif

            </td>

            <td>{{($value['status'] == 1)? "active":"inactive"}}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.cate.getDelete',$value['id'])}}" onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.cate.getEdit',$value['id'])}}">Edit</a></td>
        </tr>
      @endforeach 
    </tbody>
</table>
@endsection