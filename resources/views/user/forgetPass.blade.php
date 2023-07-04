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
    <h1>Quên mật khẩu</h1>

</div>
<form class="register" action="{{url('/forgetPass')}}" method="POST">
    @csrf
    <div class="form-group">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nhập email: </label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <!-- <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mật khẩu mới: </label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nhập lại mật khẩu mới: </label>
            <input name="password2" type="password" class="form-control" id="exampleInputPassword1">
        </div> -->
        <p class="error-noti">{{$error}}</p>
        <br>
        <button type="submit" class="btn-dangki">Lấy mật khẩu</button>
        <div class="mb-3">
            <a href="/login"> Đăng nhập </a>
            <br>
            <a href="/register"> Đăng ký </a>
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
@endsection