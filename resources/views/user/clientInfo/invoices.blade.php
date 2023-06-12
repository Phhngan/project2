@extends('layout.clientInfo')

@section('title','Đơn hàng')

@section('style')
.ck{
position: fixed;
bottom:10px;
right:10px;
background-color:#EBECFE;

}
@endsection

@section('sidebar-client')
<a href="/client">Thông tin khách hàng</a>
<a href="/client/edit">Sửa thông tin</a>
<a class="active" href="/client/invoices">Đơn hàng</a>
<a href="/client/changePass">Đổi mật khẩu</a>
@endsection

@section('content-info')
<br>
<div class="cf-title">
    <h3>Quản lí đơn hàng</h3>
</div>
<br>
<table class="table">
    <tr style="background-color:#CED7FD">
        <th>Mã hóa đơn</th>
        <th>Ngày đặt</th>
        <th>Tổng tiền</th>
        <th>Địa chỉ</th>
        <th>Ghi chú</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
    </tr>
    @forelse($invoices as $invoice)
    <tr>
        <td>
            <p>{{$invoice->sal_id}}</p>
        </td>
        <td>
            <p>{{$invoice->sal_date}}</p>

        </td>
        <td>
            <p>{{number_format($invoice->sal_total).' VND'}}</p>
        </td>
        <td>
            <p>{{$invoice->sal_detailAddress}}</p>
        </td>
        <td>
            <p>{{$invoice->sal_note}}</p>
        </td>
        <td>
            <p>
                <?php
                if ($invoice->sal_status_id == 1) {
                    echo "Đang xác nhận";
                }
                if ($invoice->sal_status_id == 2) {
                    echo "Đang chuẩn bị hàng";
                }
                if ($invoice->sal_status_id == 3) {
                    echo "Đang giao hàng";
                }
                if ($invoice->sal_status_id == 4) {
                    echo "Giao hàng thành công";
                }
                ?>
            </p>
        </td>
        <td>
            @if($invoice->sal_status_id == 1)
            <a class="btn btn-primary" href="{{url('/client/invoices/'.$invoice->sal_id.'/details')}}" role="button">Xem chi tiết</a>
            <a class="btn btn-danger" href="{{url('/client/invoices/'.$invoice->sal_id.'/cancel')}}" onclick="cancelOrder()" role="button">Hủy đơn</a>
            @else
            <a class="btn btn-primary" href="{{url('/client/invoices/'.$invoice->sal_id.'/details')}}" role="button">Xem chi tiết</a>
            @endif
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">Chưa có đơn hàng nào</td>
    </tr>
    @endforelse
</table>

<div class="ck">
    <p class="text-center" style="font-weight:bold;">Quét mã để thanh toán:</p>
    <img src="https://github.com/Phhngan/snack_images/blob/master/chuyen-khoan.jpg?raw=true" style="height:150px;display:block;margin-left:auto;margin-right:auto">
</div>
@endsection

@section('js')
@parent
<script>
    function cancelOrder() {
        alert("Bạn đã hủy đơn!");
    }
</script>
@endsection