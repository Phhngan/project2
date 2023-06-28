@extends('layout.admin_base')

@section('title','Dashboard')

@section('content')
<div class="row" style="margin-top:25px">

    <div class="small-box bg-gradient-success column-dashboard">
        <div class="inner">
            <h3>
                <?php
                $quantity1 = Illuminate\Support\Facades\DB::table('SalesInvoices')
                    ->where('sal_status_id', '=', 4)
                    ->count();
                echo $quantity1;
                ?>
            </h3>
            <p>Đơn hàng thành công</p>
        </div>
        <div class="icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="/admin/salesInvoice/thanh-cong" class="small-box-footer">
            Xem chi tiết <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>

    <div class="small-box bg-gradient-info column-dashboard">
        <div class="inner">
            <h3>
                <?php
                $quantity2 = Illuminate\Support\Facades\DB::table('SalesInvoices')
                    ->where('sal_status_id', '=', 1)
                    ->count();
                echo $quantity2;
                ?>
            </h3>
            <p>Đơn hàng chưa duyệt</p>
        </div>
        <div class="icon">
            <i class="fa fa-cubes"></i>
        </div>
        <a href="/admin/salesInvoice/chua-xac-nhan" class="small-box-footer">
            Xem chi tiết <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>

    <div class="small-box bg-gradient-warning column-dashboard">
        <div class="inner">
            <h3 style="color:white">
                <?php
                $quantity3 = Illuminate\Support\Facades\DB::table('ImportInvoiceDetails')
                    ->where('prd_status_id', '=', 2)
                    ->select('ImportInvoiceDetails.imp_expiryDate')
                    ->distinct()
                    ->count();
                echo $quantity3;
                ?>
            </h3>
            <p style="color:white">Sản phẩm gần hết hạn</p>
        </div>
        <div class="icon">
            <i class="fa fa-hourglass-end"></i>
        </div>
        <a href="/admin/productStatus/gan-het-han" class="small-box-footer">
            Xem chi tiết <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>

    <div class="small-box bg-gradient-danger column-dashboard">
        <div class="inner">
            <h3 style="color:white">
                <?php
                $quantity4 = Illuminate\Support\Facades\DB::table('ImportInvoiceDetails')
                    ->where('prd_status_id', '=', 3)
                    ->select('ImportInvoiceDetails.imp_expiryDate')
                    ->distinct()
                    ->count();
                echo $quantity4;
                ?>
            </h3>
            <p style="color:white">Sản phẩm hết hạn</p>
        </div>
        <div class="icon">
            <i class="fas fa-wheelchair"></i>
        </div>
        <a href="/admin/productStatus/het-han" class="small-box-footer">
            Xem chi tiết <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>

</div>
<hr>
<h3 class="text-center">Doanh thu theo tháng</h3>
<div class="row">

    <div class="col-nho" style="width:80px">
        <label for="year">Năm:</label>
    </div>

    <div class="col-nho" style="width:150px">
        <form id='form-quantity' method='PUT' class='quantity' action="{{url('admin/home')}}">
            <input type='button' value='-' class='qtyminus minus' field='quantity' />
            <input type='number' name='quantity' min='2022' max='{{$yearNow}}' value='{{$year}}' class='qty' />
            <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </div>

    <div class="col-nho" style="width:200px;margin-top:2px">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>

    </form>
    <div>
    </div>

    <canvas id="myChart"></canvas>
</div>

<!-- Pie Chart -->
<br>
<hr><br>
<div class="row" style="background-color:#CED7FD;border-radius:5px;padding-bottom:20px">
    <div class="col"><br>
        <h3 class="text-center">Trạng thái sản phẩm</h3>
        <div id="piechart1" style="align:center;margin-left:20px"></div>
    </div>

    <div class="col"><br>
        <h3 class="text-center">Trạng thái đơn hàng</h3>
        <div id="piechart2" style="align:center;margin-left:20px"></div>
    </div>
</div>
<hr><br>
<!-- Best Seller -->


@endsection

@section('js')
<!-- Line Chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
    <?php
    for ($i = 0; $i < 12; $i++) {
        if ($i < 9) {
            $month = '0' . $i + 1;
        } else {
            $month = $i + 1;
        }
        $invoices = Illuminate\Support\Facades\DB::table('SalesInvoiceDetails')
            ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
            ->where('SalesInvoices.sal_status_id', '<', 5)
            ->where('SalesInvoices.sal_status_id', '>', 1)
            ->where('SalesInvoices.sal_date', 'like', '%' . '-' . $month . '-' . '%')
            ->where('SalesInvoices.sal_date', 'like', '%' . $year . '%')
            ->select('SalesInvoiceDetails.*')
            ->get();
        $sales[$i] = 0;
        $imports[$i] = 0;
        $revenues[$i] = 0;
        foreach ($invoices as $invoice) {
            $sales[$i] = $sales[$i] + ($invoice->sal_price * $invoice->sal_quantity);
            $imports[$i] = $imports[$i] + ($invoice->imp_price * $invoice->sal_quantity);
            $revenues[$i] = $sales[$i] - $imports[$i];
        }
        // $sales[$i] = Illuminate\Support\Facades\DB::table('SalesInvoiceDetails')
        //   ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
        //   ->where('SalesInvoices.sal_status_id', '<', 5)
        //   ->where('SalesInvoices.sal_status_id', '>', 1)
        //   ->where('SalesInvoices.sal_date', 'like', '%' . '-' . $month . '-' . '%')
        //   ->where('SalesInvoices.sal_date', 'like', '%' . $year . '%')
        //   ->sum('SalesInvoiceDetails.sal_price * SalesInvoiceDetails.sal_quantity');
        // $imports[$i] = Illuminate\Support\Facades\DB::table('SalesInvoiceDetails')
        //   ->join('SalesInvoices', 'SalesInvoiceDetails.sal_id', '=', 'SalesInvoices.sal_id')
        //   ->where('SalesInvoices.sal_status_id', '<', 5)
        //   ->where('SalesInvoices.sal_status_id', '>', 1)
        //   ->where('SalesInvoices.sal_date', 'like', '%' . '-' . $month . '-' . '%')
        //   ->where('SalesInvoices.sal_date', 'like', '%' . $year . '%')
        //   ->sum('SalesInvoiceDetails.imp_price', '*', 'SalesInvoiceDetails.sal_quantity');
        // $revenues[$i] = $sales[$i] - $imports[$i];
    }
    ?>
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                    label: 'Tổng tiền bán ra',
                    data: [<?php echo $sales[0] ?>, <?php echo $sales[1] ?>, <?php echo $sales[2] ?>, <?php echo $sales[3] ?>, <?php echo $sales[4] ?>, <?php echo $sales[5] ?>,
                        <?php echo $sales[6] ?>, <?php echo $sales[7] ?>, <?php echo $sales[8] ?>, <?php echo $sales[9] ?>, <?php echo $sales[10] ?>, <?php echo $sales[11] ?>
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Tổng tiền nhập vào',
                    data: [<?php echo $imports[0] ?>, <?php echo $imports[1] ?>, <?php echo $imports[2] ?>, <?php echo $imports[3] ?>, <?php echo $imports[4] ?>, <?php echo $imports[5] ?>,
                        <?php echo $imports[6] ?>, <?php echo $imports[7] ?>, <?php echo $imports[8] ?>, <?php echo $imports[9] ?>, <?php echo $imports[10] ?>, <?php echo $imports[11] ?>
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Tổng tiền lãi',
                    data: [<?php echo $revenues[0] ?>, <?php echo $revenues[1] ?>, <?php echo $revenues[2] ?>, <?php echo $revenues[3] ?>, <?php echo $revenues[4] ?>, <?php echo $revenues[5] ?>,
                        <?php echo $revenues[6] ?>, <?php echo $revenues[7] ?>, <?php echo $revenues[8] ?>, <?php echo $revenues[9] ?>, <?php echo $revenues[10] ?>, <?php echo $revenues[11] ?>
                    ],
                    borderWidth: 1
                },
            ]
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
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Total'],
            ['Còn hạn',
                <?php
                $num1 = Illuminate\Support\Facades\DB::table('ImportInvoiceDetails')
                    ->where('prd_status_id', '=', 1)
                    ->select('ImportInvoiceDetails.imp_expiryDate')
                    ->distinct()
                    ->count();
                echo $num1;
                ?>
            ],
            ['Gần hết hạn',
                <?php
                $num2 = Illuminate\Support\Facades\DB::table('ImportInvoiceDetails')
                    ->where('prd_status_id', '=', 2)
                    ->select('ImportInvoiceDetails.imp_expiryDate')
                    ->distinct()
                    ->count();
                echo $num2;
                ?>
            ],
            ['Đã hết hạn',
                <?php
                $num3 = Illuminate\Support\Facades\DB::table('ImportInvoiceDetails')
                    ->where('prd_status_id', '=', 3)
                    ->select('ImportInvoiceDetails.imp_expiryDate')
                    ->distinct()
                    ->count();
                echo $num3;
                ?>
            ],
            ['Đã bán hết',
                <?php
                $num4 = Illuminate\Support\Facades\DB::table('ImportInvoiceDetails')
                    ->where('prd_status_id', '=', 4)
                    ->select('ImportInvoiceDetails.imp_expiryDate')
                    ->distinct()
                    ->count();
                echo $num4;
                ?>
            ],
            ['Không còn sản xuất',
                <?php
                $num5 = Illuminate\Support\Facades\DB::table('ImportInvoiceDetails')
                    ->where('prd_status_id', '=', 5)
                    ->select('ImportInvoiceDetails.imp_expiryDate')
                    ->distinct()
                    ->count();
                echo $num5;
                ?>
            ],
        ]);
        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'Tổng số sản phẩm: ' + <?php echo $num1 + $num2 + $num3 + $num4 + $num5 ?>,
            'width': 550,
            'height': 400
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
    }
</script>

<!-- Pie Chart 2 -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Total'],
            ['Chưa xác nhận',
                <?php
                $num6 = Illuminate\Support\Facades\DB::table('SalesInvoices')
                    ->where('sal_status_id', '=', 1)
                    ->count();
                echo $num6;
                ?>
            ],
            ['Đã xác nhận',
                <?php
                $num7 = Illuminate\Support\Facades\DB::table('SalesInvoices')
                    ->where('sal_status_id', '=', 2)
                    ->count();
                echo $num7;
                ?>
            ],
            ['Đã ship hàng',
                <?php
                $num8 = Illuminate\Support\Facades\DB::table('SalesInvoices')
                    ->where('sal_status_id', '=', 3)
                    ->count();
                echo $num8;
                ?>
            ],
            ['Nhận thành công',
                <?php
                $num9 = Illuminate\Support\Facades\DB::table('SalesInvoices')
                    ->where('sal_status_id', '=', 4)
                    ->count();
                echo $num9;
                ?>
            ],
            ['Đã hủy',
                <?php
                $num10 = Illuminate\Support\Facades\DB::table('SalesInvoices')
                    ->where('sal_status_id', '=', 5)
                    ->count();
                echo $num10;
                ?>
            ],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'Tổng số đơn hàng: ' + <?php echo $num6 + $num7 + $num8 + $num9 + $num10 ?>,
            'width': 550,
            'height': 400
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
    }
</script>
<script>
    jQuery(document).ready(($) => {
        $('.quantity').on('click', '.plus', function(e) {
            let $input = $(this).prev('input.qty');
            let val = parseInt($input.val());
            $input.val(val + 1).change();
        });

        $('.quantity').on('click', '.minus',
            function(e) {
                let $input = $(this).next('input.qty');
                var val = parseInt($input.val());
                if (val > 0) {
                    $input.val(val - 1).change();
                }
                if (val < 0) {
                    $input = 1;
                }
                if (val = 0) {
                    $input = 1;
                }

            });
    });
</script>
@endsection