@extends('layout.clientInfo')

@section('title','Sản phẩm yêu thích')

@section('style')
.text-sp{
text-decoration: none;
color:black;
}
.text-sp:hover{
text-decoration: none;
color:#3E526D;
}

@endsection

@section('sidebar-client')
<a href="/client">Thông tin khách hàng</a>
<a class="active" href="/client/favorite">Sản phẩm yêu thích</a>
<a href="/client/edit">Sửa thông tin</a>
<a href="/client/invoices">Đơn hàng</a>
<a href="/client/comment">Đánh giá</a>
<a href="/client/changePass">Đổi mật khẩu</a>
@endsection

@section('content-info')
<br>
<div class="cf-title">
    <h3>Sản phẩm yêu thích</h3>
</div>

<div class="item-products">
    <table class="table">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
        @forelse($products as $product)
        <tr>
            <td>
                <p>{{$product->prd_code}}</p>
            </td>
            <td>
                <img src="{{$product->img_url}}" style="height:100px">
            </td>
            <td>
                <a href="" class="text-sp">{{$product->prd_name}}</a>
            </td>
            <td>
                <p>{{number_format($product->prd_price * (100 - $product->prd_discount)/100).' VND'}}</p>
            </td>
            <td>
                <form method="POST" action="{{url('/client/favorite/'.$product->prd_id.'/delete')}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">Chưa có sản phẩm yêu thích</td>
        </tr>
        @endforelse
    </table>
</div>

@endsection

@section('js')
@parent

@endsection