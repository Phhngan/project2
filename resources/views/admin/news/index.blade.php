@extends('layout.admin_base')

@section('title','Danh sách tin tức')

@section('content')
<br>
<a class="btn btn-primary" href="{{url('admin/tintuc/create')}}" role="button">+ Thêm bài viết</a>
<br><br>
<table class="table" id="myTable">
    <thead>
    <tr>
        <th>ID</th>
        <th>Tên bài viết</th>
        <th>Ngày viết</th>
        <th>Hành động</th>
    </tr>
    </thead>
    <tr>
        <td>
            <p>1</p>
        </td>
        <td>
            <p>Quốc tế thiếu nhi</p>
        </td>
        <td>
            <p>02/06/2023</p>
        </td>
        <td>
            <a class="btn btn-primary" href="{{url('admin/tintuc/edit')}}" role="button">Sửa</a>
            <a class="btn btn-outline-secondary" href="{{url('admin/tintuc/detail')}}" role="button">Xem chi tiết</a>
            <br>
        </td>
    </tr>

</table>
@endsection