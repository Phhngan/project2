@extends('layout.base_page')

@section('title','Đặt hàng thành công')

@section('style')
.thank {
  background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
  background-size: 400% 400%;
  animation: gradient 10s ease infinite;
  height: 100vh;
  padding-top:100px;
  margin-top:-25px;
  margin-bottom:-50px;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
@endsection

@section('full-screen-content')
<div class="thank">
<div class="cf-title">
<h3>Đặt hàng thành công</3>
</div>
<p class="text-center">Theo dõi đơn hàng của bạn <a href= "/client/invoices" >tại đây</a>.</p>

</div>


@endsection

@section('js')
@parent

@endsection