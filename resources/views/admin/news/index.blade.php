@extends('layout.admin_base')

@section('title','Danh sách tin tức')

@section('content')
<br>
<a class="btn btn-primary" href="{{url('admin/news/create')}}" role="button">+ Thêm bài viết</a>
<br><br>
<table class="table" id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th data-orderable="false">Tên bài viết</th>
            <th data-orderable="false">Ảnh</th>
            <th data-orderable="false">Ngày viết</th>
            <th data-orderable="false">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @forelse($news as $new)
        <tr>
            <td>
                <p>{{$new->new_id}}</p>
            </td>
            <td>
                <p>{{$new->new_title}}</p>
            </td>
            <td>
                <img src="/storage/{{substr($new->new_image, 7)}}" width="100px">
            </td>
            <td>
                <p>{{$new->new_day}}</p>
            </td>
            <td>
                <a class="btn btn-primary" href="{{url('admin/news/'.$new->new_id.'/edit')}}" role="button">Sửa</a>
                <a class="btn btn-outline-primary" href="{{url('admin/news/'.$new->new_id)}}" role="button">Xem chi tiết</a>
            </td>
        </tr>
        @empty
        <tr>
            <td>Danh sách rỗng</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection