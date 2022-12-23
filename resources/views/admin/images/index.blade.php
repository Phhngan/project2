@extends('layout.admin_base')

@section('title','Thư viện')

@section('content')
<a class="btn btn-primary" href="{{url('admin/images/create')}}" role="button">+ Thêm ảnh</a>
<table class="table">
    <tr>
        <th>Mã ảnh</th>
        <th>Ảnh</th>
        <th>URL ảnh</th>
        <th>Role</th>
        <th>ID sản phẩm</th>
        <th>Hành động</th>
    </tr>
    @forelse($images as $image)
    <tr>
        <td>
            <p>{{$image->img_id}}</p>
        </td>
        <td>
            <img src="{{$image->img_url}}">
        </td>
        <td>
            <p>{{$image->img_url}}</p>

        </td>
        <td>
            <p>{{$image->img_role}}</p>
        </td>
        <td>
            <p>{{$image->prd_id}}</p>
        </td>

        <td>
            <a class="btn btn-outline-secondary" href="{{url('/admin/images/'.$image->img_id.'/edit')}}" role="button">Sửa</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endsection