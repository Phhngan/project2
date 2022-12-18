@extends('layout.admin_base')

@section('title','Danh mục sản phẩm')

@section('content')
    {{--    Do du lieu      --}}
    <a href="{{url('admin/products/create')}}">+ Thêm sản phẩm</a>
    <table class="table">
        <tr>
            <th>Sản phẩm</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
        @forelse($products as $product)
            <tr>
                <td>
                    <p>{{$product->name}}</p>
                    <a href="{{url('/admin/products/'.$product->id)}}">
                        <img src="{{$product->image}}" width="150px"/>
                    </a>
                </td>
                <td>
                    {!! $product->description !!}
                </td>
                <td>
                    <a href="{{url('/admin/products/'.$product->id.'/edit')}}">Sửa</a>

                    <br>
                    <form method="POST" action="{{url('admin/products/'.$product->id.'/delete')}}">
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