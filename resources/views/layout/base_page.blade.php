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
.top-bar{
    background-color: #5168A1;
    overflow: hidden;
}

.top-item {
  float: left;
  color: white;
  text-align: center;
  font-family: "Times New Roman", Times, serif;
  text-decoration: none;
  font-size: 17px;
}
.top-item:hover{
    color:white;
}
.header{
    background-color: #A8B3D0;
    height:150px;
}
.logo{
    padding: 2px;
}

        @yield('style');
    </style>
</head>

<body>
        <nav class="top-bar">
        <a href="#home" class="top-item">Home |</a>
        <a href="#lienhe" class="top-item">Liên hệ</a>
        </nav>

        <div class="header">
            <nav class="header">
            <a class="navbar-brand" href="#">
      <img src="/images/logo1.png" alt="" width="100" class="logo">
    </a>
    <input type="text" placeholder="Search..">
    <a></a>
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