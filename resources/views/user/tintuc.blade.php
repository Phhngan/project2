@extends('layout.base_page')

@section('title','Tin tức')

@section('style')
.card-tt {
background-color: #CED7FD;
padding: 20px;
margin-top: 20px;
border-radius: 20px;
}
.cf-title h2:after {
width:120px;
height:2px;
display:block;
content:"";
position:relative;
margin-top:10px;
margin-bottom:20px;
left:50%;
margin-left:-120px;
background-color: #b80000;
}
.post-text{
margin-top: 15px;
text-decoration: none;
font-weight: bold;
background-color: #495FB6;
width: 100px;
padding: 10px;
border-radius: 50px;
text-align: center;
display: flex;
margin-left: auto;
margin-right: auto;
}

.short-content{
text-overflow: ellipsis;
overflow: hidden;
-webkit-line-clamp: 2;
-webkit-box-orient: vertical;
display: -webkit-box;
opacity: 0.8;
}

@endsection

@section('content')
<div class="row">
    <div class="leftcolumn">
        @forelse($news as $new)
        <div class="card-tt">
            <h2>{{$new->new_title}}</h2>
            <h5>{{$new->new_day}}</h5>
            <a href="/news/{{$new->new_id}}">
                <img src="/storage/{{substr($new->new_image, 7)}}" style="height:400px;width:700px;display:flex;margin-left:auto;margin-right:auto;">
            </a>
            <div class="post-text">
                <a href="/news/{{$new->new_id}}" style="color: white;text-decoration: none">Xem thêm </a>
            </div>
            <div class="short-content">
                {!!$new->new_content!!}
            </div>
        </div>
        @empty
        <h3>Không có tin tức </h3>
        @endforelse
    </div>

    <div class="rightcolumn">
        <div class="card-tt">
            <div class="cf-title">
                <h2>Về chúng tôi</h2>
            </div>
            <a href="/gioi-thieu">
                <img src="https://github.com/Phhngan/snack_images/blob/master/trang-tin-tuc/Snack-gioithieu.png?raw=true" style="width:100%;">
            </a>
            <div class="post-text">
                <a href="/gioi-thieu" style="color: white;text-decoration: none">Xem thêm </a>
            </div>
            <br>
            <p style="font-size:15px; margin-left: 0px; opacity: 0.8;">Snack là website cung cấp các sản phẩm nhập khẩu trực tiếp từ Châu Âu, Mỹ, Đức, Hàn, Nhật...</p>
        </div>

        <div class="card-tt">
            <div class="cf-title">
                <h2>Chính sách mua hàng</h2>
            </div>
            <a href="/chinh-sach">
                <img src="https://github.com/Phhngan/snack_images/blob/master/trang-tin-tuc/policy.png?raw=true" style="height:150px;width:100%;object-fit:cover;">
            </a>
            <div class="post-text">
                <a href="/chinh-sach" style="color: white;text-decoration: none">Xem thêm </a>
            </div>
            <br>
            <p style="font-size:15px; margin-left: 0px; opacity: 0.8;">Các Chính Sách,Quy Định Chung Khi Mua Hàng và cách sử dụng xu</p>
        </div>

        <div class="card-tt" style="text-align:center;">
            <h3>Theo dõi MXH</h3>
            <a href="https://www.facebook.com/profile.php?id=100094047769737" target="_blank" >
                        <img src="https://github.com/Phhngan/snack_images/blob/master/icon/facebook.png?raw=true" height="45px">
            </a>
            <a href="https://www.instagram.com/chester.hanoi/" target="_blank" >
                        <img src="https://github.com/Phhngan/snack_images/blob/master/icon/instagram.png?raw=true" height="45px">
            </a>
        </div>
    </div>
</div>
{{ $news->links() }}
@endsection


@section('js')
@parent

@endsection