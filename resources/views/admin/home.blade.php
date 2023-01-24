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

<br><hr><br>
<div class="row">
  <div class="col">
<h3 class="text-center">Trạng thái sản phẩm</h3>
<div id="piechart1" style="align:center"></div>
</div>

<div class="col">
<h3 class="text-center">Trạng thái đơn hàng</h3>
<div id="piechart2" style="align:center"></div>
</div>
</div>

   
@endsection

@section('js')
<!-- Line Chart -->
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

<!-- Pie Chart 1 -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Total'],
  ['Còn hạn', 8],
  ['Gần hết hạn', 2],
  ['Đã hết hạn', 4],
  ['Đã bán hết', 2],
  ['Không còn sản xuất', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Tổng số sản phẩm', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
  chart.draw(data, options);
}
</script>

<!-- Pie Chart 2 -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Total'],
  ['Chưa xác nhận', 8],
  ['Đã xác nhận', 2],
  ['Đã ship hàng', 4],
  ['Nhận thành công', 2],
  ['Đã hủy', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Tổng số đơn hàng', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
  chart.draw(data, options);
}
</script>
@endsection