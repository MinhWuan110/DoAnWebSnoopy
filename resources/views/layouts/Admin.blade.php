<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">
     <link rel="stylesheet" href="{{ asset('css/QLSanPham.css') }}"> 
     <link rel="stylesheet" href="{{ asset('css/QLBinhLuan.css') }}"> 
     <link rel="stylesheet" href="{{ asset('css/QLLienHe.css') }}"> 
     <link rel="stylesheet" href="{{ asset('css/DashBoard.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <title>@yield('title', 'Admin')</title>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <button class="close-btn" onclick="toggleSidebar()">✖</button>
        <div class="user-info">
            <i class="fas fa-user-circle"></i>
            <div>
                <span>Admin</span>
                <span>Admin@gmail.com</span>
            </div>
        </div>
         <div class="search-bar">
            <input placeholder="Search..." type="text" />
            <button ><i class="fas fa-search"></i></button>
        </div>
        <nav>
            <a href="#">Quản Lí Nhân Viên </a>
            <a href="#">Quản lí Danh Mục Sản Phẩm </a>
            <a href="/admin/quanlisanpham">Quản lí Sản Phẩm </a>
            <a href="#">Quản Lí Đơn Hàng </a>
            <a href="/admin/quanlibinhluan">Quản Lí Bình Luận </a>
            <a href="/admin/quanlilienhe">Quản Lí Liên Hệ </a>
        </nav>
    </div>
    <div class="header">
        <button class="menu-btn" onclick="toggleSidebar()">☰</button>
        <div class="logo">
            <img alt="Logo of a smartphone with a red background" height="50" src="https://storage.googleapis.com/a1aa/image/HfOxfaOQ1JtpBEapcv8mD3fhoWAjUL4rPtC0zGEcZ6zfWZWPB.jpg" width="50" />
            <span>SMARTPHONE</span>
        </div>
        <div class="nav">
        </div>
        <div class="search-bar">
        </div>
        <div class="contact-info">
            <span><i class="fas fa-bell"></i></span>
            <span><i class="fas fa-user"></i></span>
        </div>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

    </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>