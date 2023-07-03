@extends('layout.admin_base')

@section('title','Cập nhật hóa đơn nhập')

@section('content')
<h1 class="text-center">Cập nhật hóa đơn nhập</h1>
<?php
$products = Illuminate\Support\Facades\DB::table('Products')
    ->select('Products.*')
    ->get();
?>
@foreach($importInvoices as $importInvoice)
<form action="{{url('/admin/importInvoice/'.$importInvoice->imp_id.'/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="unitId">Đơn vị cung cấp:</label>
    <br>
    <?php
    $supplyunits = Illuminate\Support\Facades\DB::table('Supplyunits')
        ->select('Supplyunits.*')
        ->get();
    ?>
    <select class="form-control" id="" name="unitId" required>
        <option value="{{$importInvoice->unit_id}}" selected="selected">----{{ $importInvoice->unit_name }}----</option>
        @foreach($supplyunits as $supplyunit)
        <option value="{{ $supplyunit->unit_id }}">{{ $supplyunit->unit_name }}</option>
        @endforeach
    </select>
    <br>
    <label for="userId">Tên người nhập:</label>
    <br>
    <?php
    $users = Illuminate\Support\Facades\DB::table('Users')
        ->select('Users.*')->where('Users.pos_id', '>', 1)
        ->get();
    ?>
    <select class="form-control" id="" name="userId" required>
        <option value="{{$importInvoice->unit_id}}" selected="selected">----{{$importInvoice->use_lastName}} {{$importInvoice->name}}----</option>
        @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->use_lastName }} {{ $user->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="importDate">Ngày nhập:</label>
    <br>
    <input value="{{$importInvoice->imp_date}}" name="importDate" type="date" class="form-control" placeholder="Ngày nhập">
    <br>
    <?php
    $count = 0;
    foreach ($importInvoiceDetails as $importInvoiceDetail) {
        $prdID[$count] = $importInvoiceDetail->prd_id;
        $impQuantity[$count] = $importInvoiceDetail->imp_quantity;
        $impPrice[$count] = $importInvoiceDetail->imp_price;
        $impExpiryDate[$count] = $importInvoiceDetail->imp_expiryDate;
        $count++;
    }
    ?>
    <h5>Danh sách sản phẩm trong hóa đơn:</h5>
    <table id="mytable">
        <tr>
            <th></th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá sản phẩm</th>
            <th>Ngày hết hạn</th>
        </tr>
        <?php
        for ($i = 0; $i < $count; $i++) {
        ?>
            <tr>
                <td style="text-align:center;"><input type="checkbox"></td>
                <td>
                    <!-- <input name="productId[]" type="text" class="form-control" placeholder="Mã sản phẩm" value="{{$prdID[$i]}}"> -->
                    <?php
                    $productPre = App\Models\Product::findOrFail($prdID[$i]);
                    ?>
                    <select class="form-control" id="" name="productId[]" required>
                        <option value="{{$prdID[$i]}}" selected="selected">----{{$productPre->prd_name}}----</option>
                        @foreach($products as $product)
                        <option value="{{ $product->prd_id }}">{{ $product->prd_name}}</option>
                        @endforeach
                </td>
                <td><input name="quantity[]" type="text" class="form-control" placeholder="Số lượng" value="{{$impQuantity[$i]}}"></td>
                <td><input name="price[]" type="number" class="form-control" placeholder="Giá sản phẩm" value="{{$impPrice[$i]}}"></td>
                <td><input name="expiryDate[]" type="date" class="form-control" placeholder="Ngày hết hạn" value="{{$impExpiryDate[$i]}}"></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <input type="button" class="btn btn-success" value="Thêm sản phẩm" onclick="row()">
    <input type="button" class="btn btn-danger" value="Xóa" onclick="del()">
    <br><br>
    <button type="submit" class="btn btn-primary" onclick="processForm()">Thêm mới</button>
</form>

<!-- <label for="importTotal">Tổng giá trị đơn nhập:</label>
        <br>
        <input value="{{$importInvoice->imp_total}}" name="importTotal" type="number" class="form-control" placeholder="Tổng tiền nhập">
        <br> -->
<br>
<button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endforeach
@endsection

@section('js')
@parent
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    function row() {
        var mytable = document.getElementById("mytable");
        var rows = mytable.rows.length;
        var r = mytable.insertRow(rows);

        var c1 = r.insertCell(0);
        var c2 = r.insertCell(1);
        var c3 = r.insertCell(2);
        var c4 = r.insertCell(3);
        var c5 = r.insertCell(4);

        var checkbox = document.createElement("input");
        var maSP = document.createElement("input");
        var quantity = document.createElement("input");
        var price = document.createElement("input");
        var hsd = document.createElement("input");

        checkbox.type = "checkbox";
        maSP.type = "text";
        quantity.type = "number";
        price.type = "number";
        hsd.type = "date";

        maSP.class = "form-control";
        quantity.class = "form-control";
        price.class = "form-control";
        hsd.class = "form-control";

        maSP.placeholder = "Mã sản phẩm";
        quantity.placeholder = "Số lượng";
        price.placeholder = "Giá sản phẩm";
        hsd.placeholder = "Ngày hết hạn";

        r.className = "new-row"; // Add a CSS class to the row
        c1.style.textAlign = "center";

        maSP.name = "productId[]";
        quantity.name = "quantity[]";
        price.name = "price[]";
        hsd.name = "expiryDate[]";

        c1.appendChild(checkbox);
        c2.appendChild(maSP);
        c3.appendChild(quantity);
        c4.appendChild(price);
        c5.appendChild(hsd);
    }

    function del() {
        var mytable = document.getElementById("mytable");
        var rows = mytable.rows.length;

        for (var i = rows - 1; i > 0; i--) {
            if (mytable.rows[i].cells[0].children[0].checked) {
                mytable.deleteRow(i);
            }
        }
    }

    function processForm() {
        var formData = [];
        var mytable = document.getElementById("mytable");
        var rows = mytable.rows.length;

        for (var i = 1; i < rows; i++) {
            var row = mytable.rows[i];
            var productId = row.cells[1].getElementsByTagName("input")[0].value;
            var quantity = row.cells[2].getElementsByTagName("input")[0].value;
            var price = row.cells[3].getElementsByTagName("input")[0].value;
            var expiryDate = row.cells[4].getElementsByTagName("input")[0].value;

            var data = {
                productId: productId,
                quantity: quantity,
                price: price,
                expiryDate: expiryDate
            };

            formData.push(data);
        }

        // Process the form data
        console.log(formData);
    }

    function del() {
        var mytable = document.getElementById("mytable");
        var rows = mytable.rows.length;
        for (var i = rows - 1; i > 0; i--) {
            if (mytable.rows[i].cells[0].children[0].checked) {
                mytable.deleteRow(i);
            }
        }
    }
</script>
@endsection