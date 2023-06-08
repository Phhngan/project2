@extends('layout.base_page')

@section('title','Đăng kí')

@section('style')
.register{
background: white;
padding: 20px 10px 20px 10px;
margin-top: 50px;
margin-left: 200px;
margin-right: 200px;
border-radius: 5px;
border: 2px solid #766FD2;
height: auto;
}
h1{
margin-top: 20px;
text-align: center;
text-shadow: 2px 2px 5px #7B89E6;

}
.mb-3 {
margin: 25px 200px 0px 200px;
}
.btn-dangki{
margin: 0px 200px 5px 200px;
background-color: #2D1476;
color: white;
border-radius: 5px;
padding: 5px 10px 5px 10px;
}
.btn-dangki:hover {
background-color: white;
color: #2D1476;
}
a{
color: black;
}
.form-group{
padding: 50px;
}
.form-select{
width: 380px;
margin-left: 0px;
}
@endsection

@section('content')
<div>
  <h1>Đăng kí</h1>

</div>
<form class="register" action="{{url('/register')}}" method="POST">
  @csrf
  <div class="form-group">
    <div class="mb-3">
      <label for="name" class="form-label">Họ: </label>
      <input name="lastName" type="name" class="form-control" id="name">
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Tên: </label>
      <input name="firstName" type="name" class="form-control" id="name">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email: </label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Số điện thoại: </label>
      <input name="phone" type="phone" class="form-control" id="phone">
    </div>
    <!-- <div class="mb-3">
      <label for="province" class="form-label">Tỉnh: </label>
      <?php
      $provinces = Illuminate\Support\Facades\DB::table('Provinces')
        ->select('Provinces.*')
        ->get();
      ?>
      <select class="form-control" id="" name="province" required>
        <option value="" selected="selected">----Chọn tỉnh thành----</option>
        @foreach($provinces as $province)
        <option value="{{ $province->pro_id }}">{{ $province->pro_name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="district" class="form-label">Quận: </label>
      <input name="district" type="text" class="form-control" id="district" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="town" class="form-label">Huyện: </label>
      <input name="town" type="text" class="form-control" id="town" aria-describedby="emailHelp">
    </div> -->

  <div class="mb-3">
    <label for="province" class="form-label">Tỉnh thành:</label>
    <select class="form-control" id="city">
    <option value="" selected>Chọn tỉnh thành</option>           
    </select>
  </div>

  <div class="mb-3">
    <label for="district">Quận/huyện:</label>
    <select class="form-control" id="district">
    <option value="" selected>Chọn quận huyện</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="town">Phường/xã:</label>
    <select class="form-control" id="ward">
    <option value="" selected>Chọn phường xã</option>
    </select>
</div>    

<div class="region mb-3" id="region"></div>


    <div class="mb-3">
      <label for="detail" class="form-label">Địa chỉ chi tiết: </label>
      <input name="detail" type="text" class="form-control" id="detail" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Mật khẩu: </label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword2" class="form-label">Nhập lại mật khẩu: </label>
      <input name="password2" type="password" class="form-control" id="exampleInputPassword2">
    </div>
    <p class="error-noti">{{$error}}</p>
    <br>
    <button type="submit" class="btn-dangki">Đăng kí</button>
    <div class="mb-3">
      <a>Đã có tài khoản?</a>
      <a href="/login"> Đăng nhập </a>
    </div>
  </div>
</form>

@endsection

@section('js')

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
promise.then(function (result) {
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
  citis.onchange = function () {
    district.length = 1;
    ward.length = 1;
    if(this.options[this.selectedIndex].dataset.id != ""){
      const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

// In tên miền vào phần tử HTML có id là "region"
      const cityCode = parseInt(result[0].Id);
      const region = getRegionFromCityCode(cityCode);
      document.getElementById("region").innerText = `Bạn đang ở: ${region}`;

      for (const k of result[0].Districts) {
		var opt = document.createElement('option');
		 opt.value = k.Name;
		 opt.text = k.Name;
		 opt.setAttribute('data-id', k.Id);
		 district.options.add(opt);
      }
    }
  };
  district.onchange = function () {
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
//
function getRegionFromCityCode(cityCode) {
  if (cityCode == 1) {
    return 'Hà Nội';
  } else if (cityCode >= 2 && cityCode <= 38) {
    return 'Miền Bắc';
  } else if (cityCode >= 39 && cityCode <= 46) {
    return 'Miền Trung';
  } else if (cityCode >= 48 && cityCode <= 96) {
    return 'Miền Nam';
  } else {
    return 'Không xác định';
  }
}

	</script>
@endsection