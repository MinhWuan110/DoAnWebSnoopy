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
    <!-- Bao gồm CSS mới -->
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <title>@yield('title', 'SMARTPHONE')</title>
    <style>
        .product-detail {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        .product-detail:hover {
            transform: translateY(-5px);
        }

        .product-detail h2 {
            margin: 0 0 10px;
            font-size: 2em;
        }

        .product-detail p {
            margin: 5px 0;
            color: #555;
        }

        .product-detail img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            list-style-type: none;
            padding: 0;
            margin: 20px 0 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a {
            display: inline-block;
            padding: 10px 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #555;
            transition: background-color 0.3s ease-in-out;
        }

        .pagination li a:hover {
            background-color: #f0f0f0;
        }
    </style>
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

                <li><a href="/user/blog">Blog</a></li>
                <li><a href="/thongtincongty">Thông tin công ty </a></li>
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
                <p>Gọi Mua: 1900 232 460 (8:00 - 21:30)</p>
                <p>Khiếu nại: 1800.1062 (8:00 - 21:30)</p>
                <p>Bảo hành: 1900 232 464 (8:00 - 21:00)</p>
            </div>
            <div class="social-media">
                <a href="https://facebook.com" target="_blank">Facebook</a>
                <a href="https://twitter.com" target="_blank">Twitter</a>
                <a href="https://instagram.com" target="_blank">Instagram</a>
            </div>
        </div>
        <div class="right-section">
        <div class="contact-info">
                <p>Phone: +65 112233365</p>
                <p>Email: hello@gmail.com</p>
                <p>Address: 65 Huỳnh Thúc Kháng, P.BN, Q1</p>
            </div>
            
            <p>Bản quyền © {{ date('Y') }}. Tất cả quyền được bảo lưu.</p>
        </div>
    </div>
</footer>
</body>

</html>