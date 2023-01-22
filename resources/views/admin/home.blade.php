@extends('layout.admin_base')

@section('title','Dashboard')

@section('content')
<div class="row" style="margin-top:25px">

<div class="small-box bg-gradient-success column-dashboard">
  <div class="inner">
    <h3>150</h3>
    <p>Đơn hàng thành công</p>
  </div>
  <div class="icon">
    <i class="fas fa-shopping-cart"></i>
  </div>
  <a href="/admin/salesInvoice/thanh-cong" class="small-box-footer">
  Xem chi tiết <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box bg-gradient-warning column-dashboard">
  <div class="inner">
    <h3>5</h3>
    <p>Đơn hàng chưa duyệt</p>
  </div>
  <div class="icon">
    <i class="fa fa-hourglass-end"></i>
  </div>
  <a href="/admin/salesInvoice/chua-xac-nhan" class="small-box-footer">
    Xem chi tiết <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="small-box bg-gradient-danger column-dashboard">
  <div class="inner">
    <h3>10</h3>
    <p>Sản phẩm hết hạn</p>
  </div>
  <div class="icon">
    <i class="fa fa-cubes"></i>
  </div>
  <a href="/admin/productStatus/het-han" class="small-box-footer">
  Xem chi tiết <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

</div>
<hr>
<h3 class="text-center">Thống kê</h3>
<div>
  <canvas id="myChart"></canvas>
</div>


   
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
@endsection