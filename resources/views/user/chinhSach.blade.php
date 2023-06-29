@extends('layout.base_page')

@section('title','Chính sách mua hàng')

@section('style')
.policy-img{
display:flex;
margin-left: auto;
margin-right: auto;
}
@endsection

@section('content')
<div class="cf-title">
    <h3>Các Chính Sách và Quy Định Chung Khi Mua Hàng</h3>
</div>
<img src="https://github.com/Phhngan/snack_images/blob/master/trang-tin-tuc/policy.png?raw=true" width="80%" class="policy-img">
<br>
<h5>Chính sách thanh toán:</h5>
<p>Có 1 hình thức thanh toán: Chấp nhận thanh toán trực tuyến qua Momo hoặc VNPay.</p>
<p>Bất cứ thắc mắc hay trục trặc về thanh toán xin liên hệ hotline <span>1900190012</span></p>
<p><strong>Lưu ý:</strong></p>
<p> Sau khi khách hàng thanh toán, chúng tôi sẽ liên hệ xác nhận và tiến hành giao hàng.
    Nếu sau thời gian thỏa thuận mà chúng tôi không giao hàng hoặc không phản hồi lại, quý khách có thể gửi khiếu nại trực tiếp về địa chỉ trụ sở
    và yêu cầu bồi thường nếu chứng minh được sự chậm trễ làm ảnh hưởng đến kinh doanh của quý khách.
    Đối với khách hàng có nhu cầu mua số lượng lớn để kinh doanh hoặc buôn sỉ vui lòng liên hệ trực tiếp với chúng tôi để có chính sách giá cả hợp lý. Và việc thanh toán sẽ được thực hiện theo hợp đồng. Chúng tôi cam kết kinh doanh minh bạch, hợp pháp, bán hàng chất lượng, có nguồn gốc.</p>
<br>
<h5>Chính sách vận chuyển và giao nhận</h5>
<p>Thông thường sau khi nhận được thông tin đặt hàng chúng tôi sẽ xử lý đơn hàng trong vòng 24h và phản hồi lại thông tin cho khách hàng về việc
    thanh toán và giao nhận. Thời gian giao hàng thường trong khoảng từ 3-5 ngày kể từ ngày chốt đơn hàng hoặc theo thỏa thuận với khách khi đặt hàng.
    Tuy nhiên, cũng có trường hợp việc giao hàng kéo dài hơn nhưng chỉ xảy ra trong những tình huống bất khả kháng như sau:</p>
<ul>
    <li>Nhân viên chúng tôi liên lạc với khách hàng qua điện thoại không được nên không thể giao hàng.</li>
    <li>Địa chỉ giao hàng bạn cung cấp không chính xác hoặc khó tìm.</li>
    <li>Số lượng đơn hàng tăng đột biến khiến việc xử lý đơn hàng bị chậm.</li>
</ul>
<p>Về phí vận chuyển, chúng tôi sử dụng dịch vụ vận chuyển ngoài nên cước phí vận chuyển sẽ được tính theo phí của các đơn vị
    vận chuyển tùy vào vị trí và khối lượng của đơn hàng, khi liên hệ lại xác nhận đơn hàng với khách sẽ báo mức phí cụ thể cho khách hàng.</p>
<br>
<h5 id="Xu">Nhận và sử dụng Xu</h5>
<p>Sau khi nhận hàng thành công, khách hàng có thể đánh giá sản phẩm đã mua.</p>
<p>Mỗi lượt dánh giá sẽ được tặng thêm 500 xu vào tài khoản khách hàng.</p>
<br>
<p><strong>Sử dụng xu</strong></p>
<p>Quy đổi: 1,000 xu = 1,000 VND. Bạn có thể kiểm tra số xu mình đang có ở trang thông tin cá nhân.</p>
<p>Sử dụng xu ở trang check out trước khi thanh toán, nhập số xu là bội của 100 và không được vượt quá số xu hiện có:</p>
<img src="https://github.com/Phhngan/snack_images/blob/master/trang-tin-tuc/xu-snack.png?raw=true" width="50%" class="policy-img" style="border: 1px solid grey;">
<br>
<h5>Một số lưu ý:</h5>
<ul>
    <li>Khách hàng chỉ có thể hủy đơn hàng khi đơn hàng đang ở trạng thái "Đang xác nhận". Sau khi đơn hàng chuyển sang trạng thái "Đã xác nhận",
        không thể hủy đơn hàng nữa.</li>
    <li>Mua hàng, xem đơn hàng, và thêm sản phẩm vào giỏ chỉ áp dụng cho khách hàng đã đăng ký tài khoản trên cửa hàng.</li>
</ul>
@endsection


@section('js')
@parent

@endsection