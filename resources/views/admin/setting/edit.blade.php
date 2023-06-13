@extends('layout.admin_base')

@section('title','Đổi thông tin')

@section('content')
<h1 class="text-center">Đổi thông tin</h1>
@foreach($users as $user)
<form action="{{url('/admin/profile/edit')}}" method="POST">
    @csrf
    @method('put')
    <br>
    <label for="lastName">Họ:</label>
    <br>
    <input value="{{ $user->use_lastName }}" name="lastName" type="text" class="form-control" placeholder="Họ">
    <br>
    <label for="firstName">Tên:</label>
    <br>
    <input value="{{ $user->name }}" name="firstName" type="text" class="form-control" placeholder="Tên">
    <br>
    <label for="gender">Giới tính:</label>
    <br>
    <select class="form-control" id="" name="gender" required>
        <option value="{{$user->use_gender}}" selected="selected">----
            <?php
            if ($user->use_gender == 1) {
                echo "Nam";
            } else
                echo "Nữ";
            ?>----
        </option>
        <option value="1">Nam</option>
        <option value="2">Nữ</option>
    </select>
    <br>
    <label for="phone">Số điện thoại:</label>
    <br>
    <input value="{{ $user->use_phone }}" name="phone" type="phone" class="form-control" placeholder="Số điện thoại">
    <br>

    <!-- <label for="province">Tỉnh thành:</label>
    <br>
    <?php
    $provinces = Illuminate\Support\Facades\DB::table('Provinces')
        ->select('Provinces.*')
        ->get();
    ?>
    <select class="form-control" id="" name="province" required>
        <option value="{{ $user->pro_id  }}" selected="selected">----{{ $user->pro_name }}----</option>
        @foreach($provinces as $province)
        <option value="{{ $province->pro_id }}">{{ $province->pro_name }}</option>
        @endforeach
    </select>
    <br>
    <label for="district">Quận/huyện:</label>
    <br>
    <input value="{{ $user->use_district}}" name="district" type="text" class="form-control" placeholder="Quận/huyện">
    <br>
    <label for="town">Phường/xã:</label>
    <br>
    <input value="{{ $user->use_town}}" name="town" type="text" class="form-control" placeholder="Phường/xã">
    <br> -->

        <div>
    <label for="province">Tỉnh thành:</label>
    <select class="form-control" id="city">
    <option value="" selected>Chọn tỉnh thành</option>           
    </select>

    <br>
    <label for="district">Quận/huyện:</label>
    <br>
    <select class="form-control" id="district">
    <option value="" selected>Chọn quận huyện</option>
    </select>

    <br>
    <label for="town">Phường/xã:</label>
    <br>
    <select class="form-control" id="ward">
    <option value="" selected>Chọn phường xã</option>
    </select>
    <br>
    </div>    

    <label for="detailAddress">Địa chỉ cụ thể:</label>
    <br>
    <input value="{{ $user->use_detailAddress}}" name="detailAddress" type="text" class="form-control" placeholder="Địa chỉ cụ thể">
    <br>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <br><br>
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
	</script>
@endsection