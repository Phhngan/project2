<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Untitled')</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/base_site.css')}}">
    <style>

.header {
    background-color: #A8B3D0;
    height: 120px;
    position: sticky;
}

.logo {
    margin-top: 12px;
    margin-left:25px;
    float: left;
}

* {
  box-sizing: border-box;
}

form.example {
  margin-top:20px;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 10%;
  padding: 10px;
  background: #5168A1;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}

.header .dangnhap-dangki {
    float: inherit;
}

.dang-nhap,
.dang-ki {
    float: inherit;
    color: white;
    font-family: "Times New Roman", Times, serif;
    text-decoration: none;
    font-size: 17px;
    margin-top:30px;
}

.cart {
    float: inherit;
    margin-top: 30px;
}

.header-bottom {
    background-color: #5168A1;
    overflow: hidden;
}

.bot-item {
    float: left;
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 15px;
    margin-left: 180px;
    padding: 6px;
}

.header-bottom .bot-item:hover{
    background-color: white;
    border-radius: 5px;
    color: #2D1476;
}

.text-white{
text-decoration: none;
}
.footer{
margin-top: 50px;
}

/* Create four equal columns that floats next to each other */
.column-1  {
  float: left;
  width: 20%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}
.column-2  {
  float: left;
  width: 55%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}
.column-3  {
  float: left;
  width: 15%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}
.column-4  {
  float: left;
  width: 10%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

        @yield('style');
    </style>
</head>

<body>
    <!-- header -->
    

    <nav class="header">
    <div class="row">
  <div class="column-1" >
  <a class="navbar-brand" href="/home">
                <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/logo/logo1.png" alt="logo"
                    height="80px" class="logo">
            </a>
  </div>
  <div class="column-2">
  <form class="example" action="/action_page.php">
  <input type="text" placeholder="Search" name="search">
  <button type="submit" class="btn btn-primary">Search</button>
</form>
  </div>
  <div class="column-3">
  <div class="dangnhap-dangki">
                    <a href="/login" class="dang-nhap"> Đăng nhập /</a>
                    <a href="/register" class="dang-ki"> Đăng ký </a></div>
  </div>
  <div class="column-4">
  <a class="cart" href="#cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-cart"
                            viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </a>
  </div>
</div>
</nav>
    <!-- header-bottom -->
    <nav class="header-bottom">
        <a href="/home" class="bot-item">Trang chủ</a>
        <a href="/gioi-thieu" class="bot-item">Giới thiệu</a>
        <a href="#" class="bot-item">Đồ mặn</a>
        <a href="#" class="bot-item">Đồ ngọt</a>
        <a href="#" class="bot-item">Đồ uống</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <div class="full-screen-content">
          @yield('full-screen-content')
      </div>

    <!-- FOOTER -->
    <nav class="footer">
        <!-- Footer -->
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">

    <!-- Section: Text -->
    <section class="mb-4">
      <p>
      
      </p>
    </section>
    <!-- Section: Text -->

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Liên kết nhanh</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="/home" class="text-white">Trang chủ</a>
            </li>
            <li>
              <a href="#!" class="text-white">Giới thiệu</a>
            </li>
            <li>
              <a href="#!" class="text-white">Sản phẩm</a>
            </li>
            <li>
              <a href="#!" class="text-white">Liên hệ</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Về chúng tôi</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <p class="text-white">Chúng tôi chuyên cung cấp các sản phẩm thực phẩm sạch, an toàn cho sức khoẻ người tiêu dùng</p>
            </li>
            <li>
              <p class="text-white">Hai Bà Trưng, Hà Nội, Vietnam</p>
            </li>
            <li>
              <p class="text-white"> 1900 1000
Thứ 2 - Chủ nhật: 9:00 - 18:00</p>
            </li>
          </ul>
        </div>
        <!--Grid column-->

 <!--Grid column-->
 <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
 <img src="https://github.com/Phhngan/snack_images/blob/master/bo-cong-thuong.png?raw=true" alt=""
                    height="90px" class="logo">
        </div>

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

          <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/logo/logo1.png" alt=""
                    height="100px" class="logo">
        </div>

      </div>
    </section>
  </div>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
    <a class="text-white" href="#">Snack</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</nav>

    @section('js')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
    @show
</body>

</html>