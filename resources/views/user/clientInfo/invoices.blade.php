@extends('layout.clientInfo')

@section('title','Đơn hàng')

@section('style')
.popup-container {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(0, 0, 0, 0.5);
display: flex;
justify-content: center;
align-items: center;
z-index: 9999;
display: none; /* Hide the popup by default */
}

.popup-content {
background-color: #CED7FD;
padding: 20px;
border-radius: 5px;
text-align: center;
width: 498px;
height: 150px;
position: fixed;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}

.popup-buttons {
margin-top: 20px;
display: flex;
justify-content: center;
}

.popup-button {
margin: 0 10px;
padding: 8px 16px;
border: none;
border-radius: 10px;
cursor: pointer;
}

.popup-button:hover {
background-color: #ddd;
}

@endsection

@section('sidebar-client')
<a href="/client">Thông tin khách hàng</a>
<a href="/client/edit">Sửa thông tin</a>
<a href="/client/favorite">Sản phẩm yêu thích</a>
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
        <th width="400px">Địa chỉ</th>
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
            <p>{{$invoice->sal_detailAddress}} - {{$invoice->sal_town}} - {{$invoice->sal_district}} - {{$invoice->sal_province}}</p>
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
            <?php
            if ($invoice->sal_status_id == 1) {
            ?>
                <a class="btn btn-primary" href="{{url('/client/invoices/'.$invoice->sal_id.'/details')}}" role="button" style="margin-bottom:10px">Xem chi tiết</a><br>

                <a class="btn btn-danger" onclick="cancelOrder()" role="button" style="width:110px;">Hủy đơn</a>
                <div id="cancelPopup" class="popup-container">
                    <div class="popup-content">
                        <p><strong>Bạn có muốn hủy đơn hàng?</strong></p>
                        <div class="popup-buttons">
                            <button class="popup-button" onClick="closePopup()" style="background-color:#F4CCCD;">Cancel</button>
                            <form action="{{ url('/client/invoices/'.$invoice->sal_id.'/cancel') }}" method="put">
                                <button class="popup-button" style="color:white;background-color:red">Hủy đơn</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php
            if ($invoice->sal_status_id == 4) {
                $countInvoice = Illuminate\Support\Facades\DB::table('SalesInvoiceDetails')
                    ->select('SalesInvoiceDetails.*')
                    ->where('SalesInvoiceDetails.sal_id', $invoice->sal_id)
                    ->count();
                $countComment = Illuminate\Support\Facades\DB::table('Comments')
                    ->select('Comments.*')
                    ->where('Comments.sal_id', $invoice->sal_id)
                    ->count();
                if ($countComment < $countInvoice) {
            ?>
                    <a class="btn btn-primary" href="{{url('/client/invoices/'.$invoice->sal_id.'/details')}}" role="button" style="margin-bottom:10px">Xem chi tiết</a><br>
                    <a class="btn btn-warning" href="{{url('/client/invoices/'.$invoice->sal_id.'/ratting')}}" role="button">Đánh giá</a>
                <?php
                } else {
                ?>
                    <a class="btn btn-primary" href="{{url('/client/invoices/'.$invoice->sal_id.'/details')}}" role="button" style="margin-bottom:10px">Xem chi tiết</a><br>
                    <p class="btn btn-success" disabled>Đã đánh giá</p>
            <?php }
            } ?>
            <?php
            if ($invoice->sal_status_id > 1 && $invoice->sal_status_id < 4) {
            ?>
                <a class="btn btn-primary" href="{{url('/client/invoices/'.$invoice->sal_id.'/details')}}" role="button" style="margin-bottom:10px">Xem chi tiết</a><br>
            <?php } ?>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">Chưa có đơn hàng nào</td>
    </tr>
    @endforelse
</table>
{{ $invoices->links() }}
@endsection

@section('js')
@parent
<script>
    function cancelOrder() {
        var confirmationPopup = document.getElementById("cancelPopup");
        confirmationPopup.style.display = "block";
    }

    function closePopup() {
        var confirmationPopup = document.getElementById("cancelPopup");
        confirmationPopup.style.display = "none";
    }

    var cancel = document.getElementById('cancelPopup');
    window.onclick = function(event) {
        if (event.target == cancel) {
            cancel.style.display = "none";
        }
    }
</script>
@endsection