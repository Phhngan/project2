@extends('layout.admin_base')

@section('title','Thêm hóa đơn nhập hàng')

@section('content')
<h1 class="text-center">Tạo hóa đơn nhập hàng mới</h1>
<form action="{{url('/admin/importInvoice/create')}}" method="POST">
    @csrf
    <br>
    <label for="unitId">Đơn vị cung cấp:</label>
    <br>
    <?php
    $supplyunits = Illuminate\Support\Facades\DB::table('Supplyunits')
        ->select('Supplyunits.*')
        ->get();
    ?>
    <select class="form-control" id="" name="unitId" required>
        <option value="" selected="selected">----Chọn đơn vị cung cấp----</option>
        @foreach($supplyunits as $supplyunit)
        <option value="{{ $supplyunit->unit_id }}">{{ $supplyunit->unit_name }}</option>
        @endforeach
    </select>
    <br>
    <label for="userId">Người nhập:</label>
    <br>
    <?php
    $users = Illuminate\Support\Facades\DB::table('Users')
        ->select('Users.*')->where('Users.pos_id', '>', 1)
        ->get();
    ?>
    <select class="form-control" id="" name="userId" required>
        <option value="" selected="selected">----Chọn người nhập----</option>
        @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->use_lastName }} {{ $user->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="importDate">Ngày nhập:</label>
    <br>
    <input name="importDate" type="date" class="form-control" placeholder="Ngày nhập">
    <br>
    <h5>Thêm sản phẩm vào hóa đơn:</h5>
    <table id="mytable">
        <tr>
            <th></th>
            <th>Mã sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá sản phẩm</th>
            <th>Ngày hết hạn</th>
        </tr>
        <tr>
            <td style="text-align:center;"><input type="checkbox"></td>
            <td><input name="productId[]" type="text" class="form-control" placeholder="Mã sản phẩm"></td>
            <td><input name="quantity[]" type="text" class="form-control" placeholder="Số lượng"></td>
            <td><input name="price[]" type="number" class="form-control" placeholder="Giá sản phẩm"></td>
            <td><input name="expiryDate[]" type="date" class="form-control" placeholder="Ngày hết hạn"></td>
        </tr>
    </table>
    <br>
    <input type="button" class="btn btn-success" value="Thêm sản phẩm" onclick="row()">
    <input type="button" class="btn btn-danger" value="Xóa" onclick="del()">
    <br><br>
    <button type="submit" class="btn btn-primary" onclick="processForm()">Thêm mới</button>
</form>
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