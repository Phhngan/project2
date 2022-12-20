@extends('layout.admin_base')

@section('title','Loại sản phẩm')

@section('content')
{{-- Do du lieu --}}
<a href="{{url('admin/product-type/create')}}">+ Thêm loại sản phẩm</a>
<table class="table">
    <tr>
        <th>Mã loại sản phẩm</th>
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
            <a class="btn btn-outline-secondary" href="{{url('/admin/product-type/'.$product->prd_type_id.'/edit')}}" role="button">Sửa</a>
            <br>
                @csrf
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