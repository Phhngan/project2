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
    <style>
        .top-bar {
            background-color: #5168A1;
            overflow: hidden;
            position: sticky;
        }

        .top-item {
            float: left;
            color: white;
            text-align: center;
            font-family: "Times New Roman", Times, serif;
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
  float:inherit;
  /* width: 700px; */
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
/* .dang-nhap, .dang-ki{
    float: inherit;
            color: white;
            font-family: "Times New Roman", Times, serif;
            text-decoration: none;
            font-size: 20px;
            margin: 50px auto 50px auto;
} */

        @yield('style');
    </style>
</head>

<body>
    <nav class="top-bar">
        <a href="#home" class="top-item"><strong>Home |</strong></a>
        <a href="#lienhe" class="top-item"><strong>Liên hệ</strong></a>
    </nav>

    <div class="header">
        <nav class="header">
            <a class="navbar-brand" href="/home">
                <img src="https://raw.githubusercontent.com/Phhngan/snack_images/master/logo/logo1.png" alt="" height="100px" class="logo">
            </a>
            
            <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search" name="search">
      <button type="submit">Tìm kiếm</button>
    </form>
    <a href="#Dangnhap" class="dang-nhap"> Đăng nhập /</a>
    <a href="#Dangki" class="dang-ki"> Đăng ký </a>
  </div>
            
        </nav>
    </div>

    <div class="container">
        @yield('content')
    </div>
    @section('js')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
    @show
</body>

</html>