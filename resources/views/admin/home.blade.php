@extends('layout.admin_base')

@section('title','Dashboard')

@section('content')
<div class="row" style="margin-top:25px">

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

    <div class="small-box bg-gradient-primary column-dashboard">
        <div class="inner">
            <h3>
                <?php
                $products = Illuminate\Support\Facades\DB::table('Products')
                    ->select('Products.*')
                    ->orderBy('prd_id')
                    ->get();
                $count = count($products);
                $array = [];
                foreach ($products as $product) {
                    for ($i = 0; $i < $count; $i++) {
                        if ($i == $product->prd_id - 1) {
                            $quantity = Illuminate\Support\Facades\DB::table('ImportInvoiceDetails')
                                ->where('prd_id', $product->prd_id)
                                ->where('prd_status_id', '<', 3)
                                ->sum('ImportInvoiceDetails.imp_quantity_left');
                            if ($quantity == 0) {
                                $array[$i]['quantity'] = $quantity;
                                $array[$i]['code'] = $product->prd_id;
                            }
                        }
                    }
                }
                if (!$array) {
                    $countArray = 0;
                } else {
                    $countArray = count($array);
                }
                echo $countArray;
                ?>
            </h3>
            <p>Sản phẩm đã bán hết</p>
        </div>
        <div class="icon">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
        <a href="/admin/products" class="small-box-footer">
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
            <i class="fa fa-exclamation-triangle"></i>
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
    <form id='form-quantity' method='PUT' class='quantity' action="{{url('admin/home')}}" style="display:flex;">
        <div class="col-nho" style="width:150px">
            <input type='button' value='-' class='qtyminus minus' field='quantity' />
            <input type='number' name='quantity' min='2022' max='{{$yearNow}}' value='{{$year}}' class='qty' />
            <input type='button' value='+' class='qtyplus plus' field='quantity' />
        </div>
        <div class="col-nho" style="width:200px;margin-top:-1px">
            <button type="submit" class="btn btn-primary" style="height: 34px;padding: 0px 10px 0px 10px;">Cập nhật</button>
        </div>
    </form>
    <canvas id="myChart"></canvas>
</div>
<br><br>
<!-- Best Seller -->
<h3 class="text-center">Sản phẩm bán chạy</h3>
<label for="year">Năm: {{$year}}</label>
<br>
<label for="quy">Chọn quý:</label>
<br>
<form id='form-quantity' method='PUT' class='quantity' action="{{url('admin/home/'.$year)}}" style="display:flex;">
    <select style="width:250px" class="form-control" id="quy" name="quy" required>
        <option value="{{$timeId}}" selected="selected">---
            <?php
            if ($timeId == 1) echo "Cả năm";
            if ($timeId == 2) echo "Quý 1 (tháng 1, 2, 3)";
            if ($timeId == 3) echo "Quý 2 (tháng 4, 5, 6)";
            if ($timeId == 4) echo "Quý 3 (tháng 7, 8, 9)";
            if ($timeId == 5) echo "Quý 4 (tháng 10, 11, 12)";
            ?>
            ---</option>
        <option value="1">Cả năm</option>
        <option value="2">Quý 1 (tháng 1, 2, 3)</option>
        <option value="3">Quý 2 (tháng 4, 5, 6)</option>
        <option value="4">Quý 3 (tháng 7, 8, 9)</option>
        <option value="5">Quý 4 (tháng 10, 11, 12)</option>
    </select>
    <div class="col-nho" style="width:200px;margin-top:-1px">
        <button type="submit" class="btn btn-primary" style="margin-left:20px;">Cập nhật</button>
    </div>
</form>
<br>
<table class="table table-striped table-hover table-bordered table-primary">
    <?php
    if (count($productSort) == 0) {
    ?>
        <p>Chưa có đơn hàng</p>
    <?php
    } else {
    ?>
        <thead>
            <tr>
                <th>Xếp thứ</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Lượt bán</th>
            </tr>
        </thead>
        <?php
        for ($i = 0; $i < 10; $i++) {
            if ($i == count($productSort)) {
                break;
            }
            $productFinds = Illuminate\Support\Facades\DB::table('Products')
                ->select('Products.*')
                ->where('Products.prd_id', $productSort[$i]['prd_id'])
                ->get();
            foreach ($productFinds as $productFind) {
        ?>
                <tbody>
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$productFind->prd_name}}</td>
                        <td><img src="/storage/{{substr($productFind->prd_image, 7)}}" width="100px"></td>
                        <td>{{$productSort[$i]['quantity']}} lượt</td>
                    </tr>
                </tbody>
        <?php }
        } ?>
    <?php } ?>
</table>

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
<br>

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