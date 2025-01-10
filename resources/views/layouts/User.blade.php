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
            <img src="https://storage.googleapis.com/a1aa/image/HfOxfaOQ1JtpBEapcv8mD3fhoWAjUL4rPtC0zGEcZ6zfWZWPB.jpg" alt="SMARTPHONE Logo">
            <span>SMARTPHONE</span>
        </div>
        <nav>
            <ul>
                <li><a href="/trangchu">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="/blog">Blog</a></li>
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
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function changeQuantity(cartItemId, change) {
    const quantityElement = document.getElementById(`quantity-${cartItemId}`);
    let currentQuantity = parseInt(quantityElement.innerText) || 0;

    // Cập nhật số lượng
    currentQuantity += change;

    // Đảm bảo số lượng không dưới 1
    if (currentQuantity < 1) {
        alert("Số lượng không thể nhỏ hơn 1.");
        return;
    }

    // Cập nhật lại số lượng hiển thị
    quantityElement.innerText = currentQuantity;

    // Gửi yêu cầu cập nhật về server
    fetch(`/cart/update/${cartItemId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Đảm bảo CSRF token được truyền
        },
        body: JSON.stringify({ quantity: currentQuantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log("Cập nhật thành công:", data.success);
        } else {
            console.error("Có lỗi xảy ra:", data.error);
        }
    })
    .catch(error => {
        console.error("Có lỗi xảy ra:", error);
    });
}
</script>
</html>