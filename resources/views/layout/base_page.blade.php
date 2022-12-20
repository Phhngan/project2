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
    <link rel="stylesheet" href="css/base_site.css">
    <style>
.top-item {
    float: left;
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin: 2px 0px 2px 5px;
}

.top-item:hover {
    color: white;
}

.header {
    background-color: #A8B3D0;
    height: 150px;
    position: sticky;
}

.logo {
    margin-top: 25px;
    margin-bottom: 25px;
    float: left;
}

.header .search-container {
    float: inherit;
    width: 700px;
}

.header input[type=text] {
    padding: 6px;
    margin: 50px auto 25px 150px;
    font-size: 17px;
    width: 300px;
    border: none;
}

.header .search-container button {
    float: inherit;
    padding: 6px 10px;
    margin: 50px auto 25px auto;
    background: 5168A1;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.header .dangnhap-dangki {
    float: inherit;
    width: 580px;
    margin: -60px auto auto 950px;
}

.dang-nhap,
.dang-ki {
    float: inherit;
    color: white;
    font-family: "Times New Roman", Times, serif;
    text-decoration: none;
    font-size: 20px;
}

.cart {
    float: inherit;
    margin-left: 150px;
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
    font-size: 16px;
    margin: 6px 50px 6px;
    padding: 6px;
}

.bot-item:hover{
    background-color: white;
    border-radius: 5px;
    color: #2D1476;
}

.dropbtn-sp {
    margin: 6px 100px 6px 0px;
    background-color: #5168A1;
    color: white;
    padding: 6px;
    border-radius: 5px;
    font-size: 16px;
    border: none;
    overflow: hidden;
}

.dropbtn-sp:hover{
    background-color: white;
    color: #2D1476;
}

.dropd-sp {
    float: left;
    overflow: hidden;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    margin-left: 200px;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropd-sp:hover .dropdown-content {
    display: block;
}
.text-white{
text-decoration: none;
}
.footer{
margin-top: 50px;
}
        @yield('style');
    </style>
</head>

<body>
    <!-- header -->
    <div class="header">
        <nav class="header">
            <a class="navbar-brand" href="/home">
                <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/logo/logo1.png" alt=""
                    height="100px" class="logo">
            </a>

            <div class="search-container">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search" name="search">
                    <button type="submit">Tìm kiếm</button>
                </form>
                <div class="dangnhap-dangki">
                    <a href="/login" class="dang-nhap"> Đăng nhập /</a>
                    <a href="/regiter" class="dang-ki"> Đăng ký </a>
                    <a class="cart" href="#cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-cart"
                            viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- header-bottom -->
    <nav class="header-bottom">
        <a href="/home" class="bot-item">Trang chủ</a>
        <a href="/gioi-thieu" class="bot-item">Giới thiệu</a>
        <div class="dropd-sp">
            <button class="dropbtn-sp" class="bot-item">Sản phẩm</button>
            <div class="dropdown-content">
                <a href="#">Đồ mặn</a>
                <a href="#">Đồ ngọt</a>
                <a href="#">Đồ uống</a>
            </div>
        </div>
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

    <!-- Section: Form -->
    <section class="">
      <form action="">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2">
              <strong>Đăng kí để nhận thông báo</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline form-white mb-4">
              <input type="email" id="form5Example21" class="form-control" />
              <label class="form-label" for="form5Example21">Địa chỉ email</label>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-light mb-4">
              Đăng kí
            </button>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
    </section>
    <!-- Section: Form -->

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