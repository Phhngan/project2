@extends('layout.admin_base')

@section('title','Loại sản phẩm')

@section('content')
{{-- Do du lieu --}}
<a href="{{url('admin/productType/create')}}">+ Thêm loại sản phẩm</a>
<table class="table">
    <tr>
        <th>Mã</th>
        <th>Loại sản phẩm</th>
        <th>Hành động</th>
    </tr>
    @forelse($productTypes as $productType)
    <tr>
        <td>
            <p>{{$productType->prd_type_id}}</p>
        </td>
        <td>
            <p>{{$productType->prd_type}}</p>
        </td>
        <td>
            <a class="btn btn-outline-secondary" href="{{url('/admin/productType/'.$productType->prd_type_id.'/edit')}}" role="button">Sửa</a>
            <br>
            <form method="POST" action="{{url('admin/productType/'.$productType->prd_type_id.'/delete')}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Xóa</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">Danh sach rong</td>
    </tr>
    @endforelse
</table>
@endsection

@section('js')

@endsection