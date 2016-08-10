@extends('admin.master')
@section('content')
@section('title', 'Category <small>List</small>')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Active/InActive</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    {!!cate_list($data)!!}
    </tbody>
</table>
@endsection
