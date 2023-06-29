@extends('layout.admin_base')

@section('title','Thư viện')

@section('content')
<br>
<a class="btn btn-primary" href="{{url('admin/images/create')}}" role="button">+ Thêm ảnh</a>
<br>
<br>
<table class="table" id="myTable">
    <thead>
    <tr>
        <th>Ảnh</th>
        <th>URL ảnh</th>
        <th>Role</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Hành động</th>
    </tr>
    </thead>
    @forelse($images as $image)
    <tr>
        <td>
            <img src="/storage/{{$image->img_url}}" width="100px">
        </td>
        <td>
            <a href="{{$image->img_url}}" target="_blank">{{$image->img_url}}</a>

        </td>
        <td>
            <p>{{$image->img_role}}</p>
        </td>
        <td>
            <p>{{$image->prd_code}}</p>
        </td>
        <td>
            <p>{{$image->prd_name}}</p>
        </td>
        <td>
            <a class="btn btn-primary" href="{{url('/admin/images/'.$image->img_id.'/edit')}}" role="button">Sửa</a>
            <a class="btn btn-outline-danger" href="{{url('/admin/images/'.$image->img_id.'/delete')}}" role="button" style="margin-top:10px">Xóa</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endsection