@extends('admin.master')
@section('content')
@section('title', 'User <small>List</small>')
     
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Username</th>
            <th>Level</th>
            <th>Status</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    @foreach ($user as  $item)
    <?php $i ++; ?>
        <tr class="odd gradeX" align="center">
            <td>{!!$i!!}</td>
            <td>{!!$item['username']!!}</td>
            <td>
                @if ($item['id']==4)
                {{'SuperAdmin'}}
                @elseif ($item['level']==1)
                {{'Admin'}}
                @else
                {{'member'}}
                @endif
            </td>
            <td>{!!($item['status']==1)?'Active':'InActive'!!}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.user.getDelete',$item['id'])}}" onclick="return xacnhanxoa('Bạn Có Chắc Muốn Xóa Không')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.user.getEdit',$item['id'])}}">Edit</a></td>
        </tr>
    @endforeach 
    </tbody>
</table>
@endsection