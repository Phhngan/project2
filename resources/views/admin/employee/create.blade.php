@extends('layout.admin_base')

@section('title','Thêm nhân viên')

@section('content')
<h1 class="text-center">Thêm nhân viên mới</h1>
<form action="{{url('/admin/employee/create')}}" method="POST">
    @csrf
    <br>
    <label for="lastName">Họ:</label>
    <br>
    <input name="lastName" type="text" class="form-control" placeholder="Họ" required>
    <br>
    <label for="firstName">Tên:</label>
    <br>
    <input name="firstName" type="text" class="form-control" placeholder="Tên" required>
    <br>
    <label for="gender">Giới tính:</label>
    <br>
    <select class="form-control" id="" name="gender" required>
        <option value="" selected="selected">----Chọn giới tính----</option>
        <option value="1">Nam</option>
        <option value="2">Nữ</option>
    </select>
    <br>
    <label for="email">Email:</label>
    <br>
    <input name="email" type="text" class="form-control" placeholder="Email" required>
    <br>
    <label for="phone">Số điện thoại:</label>
    <br>
    <input name="phone" type="text" class="form-control" placeholder="Số điện thoại" required>
    <br>
    <div class="mb-3">
        <label for="province" class="form-label">Tỉnh thành:</label>
        <select class="form-control" id="city" name="province" required>
            <option value="" selected>---Chọn tỉnh thành---</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="district">Quận/huyện:</label>
        <select class="form-control" id="district" name="district" required>
            <option value="" selected>---Chọn quận huyện---</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="town">Phường/xã:</label>
        <select class="form-control" id="ward" name="town" required>
            <option value="" selected>---Chọn phường xã---</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="detail" class="form-label">Thôn/Đường/Số nhà:</label>
        <input name="detailAddress" type="text" class="form-control" id="detail" aria-describedby="emailHelp" required>
    </div>

    <label for="password">Mật khẩu:</label>
    <br>
    <input name="password" type="text" class="form-control" placeholder="Mật khẩu" required>
    <br>
    <label for="position">Vị trí công việc:</label>
    <br>
    <select class="form-control" id="" name="position" required>
        <option value="" selected="selected">----Chọn vị trí----</option>
        <option value="2">Quản lý tổng</option>
        <option value="3">Nhân viên kho</option>
        <option value="4">Nhân viên thu ngân</option>
        <option value="5">Nhân viên tiếp thị</option>
        <option value="6">Nhân viên gói hàng</option>
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Id === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Id);
                }
            }
        };
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            var opt = document.createElement('option');
            opt.value = x.Name;
            opt.text = x.Name;
            opt.setAttribute('data-id', x.Id);
            citis.options.add(opt);
        }
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.options[this.selectedIndex].dataset.id != "") {
                const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

                for (const k of result[0].Districts) {
                    var opt = document.createElement('option');
                    opt.value = k.Name;
                    opt.text = k.Name;
                    opt.setAttribute('data-id', k.Id);
                    district.options.add(opt);
                }
            }
        };
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
            if (this.options[this.selectedIndex].dataset.id != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex].dataset.id)[0].Wards;

                for (const w of dataWards) {
                    var opt = document.createElement('option');
                    opt.value = w.Name;
                    opt.text = w.Name;
                    opt.setAttribute('data-id', w.Id);
                    wards.options.add(opt);
                }
            }
        };
    }
</script>
@endsection