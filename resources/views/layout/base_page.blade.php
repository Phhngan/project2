<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Untitled')</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/base_site.css')}}">
    <link rel="shortcut icon" type="image/png" href="https://github.com/Phhngan/snack_images/blob/master/logo/logo1.png?raw=true" />
    <script src="https://kit.fontawesome.com/9826eb958a.js" crossorigin="anonymous"></script>

    @yield('css-link')
    <style>
        @yield('style');
    </style>
</head>

<body>
    <!-- header -->


    <nav class="header">
        <div class="row">
            <div class="column-1">
                <a class="navbar-brand" href="/home">
                    <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/logo/logo1.png" alt="logo" height="80px" class="logo">
                </a>
            </div>
            <div class="column-2">
                <form METHOD="GET" class="example" action="{{url('/search')}}">
                    <input type="text" placeholder="Search" name="searchText">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <div class="column-3">
                @if(Auth::check() == false)
                <div class="dangnhap-dangki">
                    <a href="/login" class="dang-nhap"> Đăng nhập</a>
                    @else
                    <div class="dangnhap-dangki">
                        <a href="/client" class="dang-nhap"> {{Auth::user()->name}} </a>
                    </div>
                </div>
                <div class="column-4">
                    <a class="cart" href="/cart" style="padding:10px;border-radius:50px;border:2px solid white;margin-top:18px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-cart" viewBox="0 0 16 16" style="">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <div class="quantity-in-cart">
                            <?php
                            $user = Illuminate\Support\Facades\Auth::user();
                            $quantity = Illuminate\Support\Facades\DB::table('Carts')
                                ->select('Carts.*')
                                ->where('Carts.use_id', $user->id)
                                ->count();
                            ?>
                            <p><strong><?php echo $quantity ?></strong></p>
                        </div>
                    </a>
                </div>

                <div class="column-5">
                    <a class="navbar-brand" href="/client/favorite">
                        <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/icon/heart.png" alt="heart" height="45px" style="margin-top:25px;" class="heart">
                        <div class="quantity-in-fav">
                            <?php
                            $user = Illuminate\Support\Facades\Auth::user();
                            $quan_fav = Illuminate\Support\Facades\DB::table('Favoriteproducts')
                                ->select('Favoriteproducts.*')
                                ->where('Favoriteproducts.use_id', $user->id)
                                ->count();
                            ?>
                            <p><strong><?php echo $quan_fav ?></strong></p>
                        </div>
                    </a>
                </div>
                @endif

            </div>
    </nav>
    <!-- header-bottom -->

    <nav class="header-bottom-base">
        <a href="/home" class="bot-item">Trang chủ</a>
        <a href="/gioi-thieu" class="bot-item">Giới thiệu</a>
        <a href="/products" class="bot-item">Tất cả sản phẩm</a>
        <a href="/doMan" class="bot-item">Đồ mặn</a>
        <a href="/doNgot" class="bot-item">Đồ ngọt</a>
        <a href="/doUong" class="bot-item">Đồ uống</a>
        <a href="/news" class="bot-item">Tin tức</a>
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
                                    <a href="/gioi-thieu" class="text-white">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="/products" class="text-white">Sản phẩm</a>
                                </li>
                                <li>
                                    <a class="text-white">Liên hệ: 0966 8355 87</a>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase">Về chúng tôi</h5>

                            <ul class="list-unstyled mb-0">
                                <li>
                                    <p class="text-white">Chúng tôi chuyên cung cấp các sản phẩm thực phẩm sạch, an toàn cho sức khoẻ
                                        người tiêu dùng</p>
                                </li>
                                <li>
                                    <p class="text-white">Hai Bà Trưng, Hà Nội, Vietnam</p>
                                </li>
                                <li>
                                    <p class="text-white">
                                        Thứ 2 - Chủ nhật: 8:00 - 20:00</p>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <img src="https://github.com/Phhngan/snack_images/blob/master/bo-cong-thuong.png?raw=true" alt="" height="90px" class="logo">
                        </div>

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

                            <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/logo/logo1.png" alt="" height="100px" class="logo">
                        </div>

                    </div>
                </section>
            </div>

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022 Copyright:
                <a class="text-white" href="/">Snack</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </nav>

    @section('js')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
    @show
</body>

</html>