<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/HomePage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/GioHang.css') }}">
    <link rel="stylesheet" href="{{ asset('css/TrangCaNhan.css') }}">
    <title>@yield('title', 'SMARTPHONE')</title>

</head>

<body>
    <header>
        <div class="logo">
            <img src="https://storage.googleapis.com/a1aa/image/HfOxfaOQ1JtpBEapcv8mD3fhoWAjUL4rPtC0zGEcZ6zfWZWPB.jpg"
                alt="SMARTPHONE Logo">
            <h2 class="tentrangweb">{{ $thongTin->tentrangweb ?? 'Chưa có dữ liệu' }}</h2>
        </div>
        <nav>
            <ul>

                <li><a href="/trangchu">Home</a></li>
                {{-- <li><a href="shop.html">Shop</a></li> --}}
                <li><a href="/user/blog">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

        <div class="search-cart">
            <input type="text" placeholder="SEARCH">
            <div class="icons">
                <span class="cart-icon"><a href="/cart">🛒</a></span>
                <span class="account-icon"><a href="/trangcanhan">👤</a></span>
            </div>
        </div>
        <div>
            <span>{{ $thongTin->hotline ?? 'Chưa có dữ liệu' }}</span>
        </div>
        <div class="categories-text">
            <span>All Categories</span>
        </div>
    </header>

    <main>
        <div class="main-content">

            @yield('content')

        </div>
    </main>

    <footer>
        <div class="footer-content">
            <div class="left-section">
                <div class="hotline-numbers">
                    <p>
                        Gọi Mua:
                        <span>{{ $thongTin->goimua ?? 'Chưa có dữ liệu' }}</span> |
                        <span>{{ $thongTin->giolamviec ?? 'Chưa có dữ liệu' }}</span>
                    </p>

                    <p>
                        Khiếu Nại:
                        <span>{{ $thongTin->khieunai ?? 'Chưa có dữ liệu' }}</span> |
                        <span>{{ $thongTin->giolamviec ?? 'Chưa có dữ liệu' }}</span>
                    </p>
                    <p>
                        Bảo Hành:
                        <span>{{ $thongTin->baohanh ?? 'Chưa có dữ liệu' }}</span> |
                        <span>{{ $thongTin->giolamviec ?? 'Chưa có dữ liệu' }}</span>
                    </p>
                </div>
                <div class="social-media">
                    <a href="https://facebook.com" target="_blank">Facebook</a>
                    <a href="https://twitter.com" target="_blank">Twitter</a>
                    <a href="https://instagram.com" target="_blank">Instagram</a>
                </div>
            </div>
            <div class="right-section">
                <div class="contact-info">
                    <p class="inline-items">
                        <span>Phone: {{ $thongTin->hotline ?? 'Chưa có dữ liệu' }}</span>
                        <span>Email: {{ $thongTin->email ?? 'Chưa có dữ liệu' }}</span>
                        <span>Address: {{ $thongTin->diachi ?? 'Chưa có dữ liệu' }}</span>
                    </p>







                </div>

                <p>Bản quyền © {{ date('Y') }}. Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>
</body>

</html>







{{-- 
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <!-- Thông tin trang web từ bảng thongtintrangweb -->
    <div class="container mt-5">
        <h1>Thông Tin Trang Web</h1>
        <table class="table table-bordered">
            <tr>
                <th>Tên Trang Web</th>
                <td>{{ $thongTin->tentrangweb ?? 'Chưa có dữ liệu' }}</td>
            </tr>
            <tr>
                <th>Hotline</th>
                <td>{{ $thongTin->hotline ?? 'Chưa có dữ liệu' }}</td>
            </tr>
            <tr>
                <th>Gọi Mua</th>
                <td>{{ $thongTin->goimua ?? 'Chưa có dữ liệu' }}</td>
            </tr>
            <tr>
                <th>Khiếu Nại</th>
                <td>{{ $thongTin->khieunai ?? 'Chưa có dữ liệu' }}</td>
            </tr>
            <tr>
                <th>Bảo Hành</th>
                <td>{{ $thongTin->baohanh ?? 'Chưa có dữ liệu' }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $thongTin->email ?? 'Chưa có dữ liệu' }}</td>
            </tr>
            <tr>
                <th>Địa Chỉ</th>
                <td>{{ $thongTin->diachi ?? 'Chưa có dữ liệu' }}</td>
            </tr>
            <tr>
                <th>Giờ Làm Viêc </th>
                <td> {{ $thongTin->giolamviec ?? 'Chưa có dữ liệu' }}</td>
            </tr>
        </table>
    </div>

    <!-- Nội dung chính của trang -->
    <div class="container">
        @yield('content')
    </div>

</body>

</html> --}}
