<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/HomePage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/GioHang.css') }}">
    <link rel="stylesheet" href="{{ asset('css/TrangCaNhan.css') }}">
    <title>@yield('title', 'SMARTPHONE')</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="https://storage.googleapis.com/a1aa/image/HfOxfaOQ1JtpBEapcv8mD3fhoWAjUL4rPtC0zGEcZ6zfWZWPB.jpg" alt="SMARTPHONE Logo">
            <span>SMARTPHONE</span>
        </div>
        <nav>
            <ul>
                <li><a href="/trangchu">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/lienhe">Contact</a></li>
            </ul>
        </nav>
        <div class="search-cart">
            <input type="text" placeholder="SEARCH">
            <div class="icons">
                <span class="cart-icon">🛒</span>
                <span class="account-icon">👤</span>
            </div>
        </div>
        <div>
            <span>+65 1122233365</span>
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