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
        <tr class="odd gradeX" align="center">
            <td>1</td>
            <td>quoctuan</td>
            <td>Superadmin</td>
            <td>Hiện</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
        </tr>
        <tr class="even gradeC" align="center">
            <td>2</td>
            <td>kutun</td>
            <td>Admin</td>
            <td>Ẩn</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
        </tr>
        <tr class="odd gradeX" align="center">
            <td>3</td>
            <td>kuteo</td>
            <td>Member</td>
            <td>Hiện</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
        </tr>
    </tbody>
</table>
@endsection