@extends('layouts.User') <!-- Kết nối với layout chính -->
@section('title', 'Giỏ Hàng')

@section('content')
<div class="container">
    <h2>Giỏ hàng</h2>

    <div class="center">
        <div class="mb-3">
            <input type="radio" id="delivery" name="delivery" value="delivery" checked>
            <label for="delivery">Giao tận nơi</label>
            <input type="radio" id="pickup" name="delivery" value="pickup">
            <label for="pickup">Nhận tại cửa hàng</label>
        </div>
    </div>

    <div class="cart-items">
        @if ($gioHang->isEmpty()) <!-- Kiểm tra giỏ hàng có rỗng không -->
        <p>Giỏ hàng của bạn hiện tại trống. Vui lòng thêm sản phẩm vào giỏ hàng!</p>
        @else
        @foreach ($gioHang as $item)
        @php
        $sanPham = $sanPhamDetails->firstWhere('MaSanPham', $item->MaSanPham);
        $hinhAnh = DB::table('hinhanhsanpham')->where('MaSanPham', $item->MaSanPham)->first();
        @endphp
        <div class="cart-item d-flex justify-content-between align-items-center">
            <div class="item-info">
                <img src="{{ $hinhAnh->DuongDanHinhAnh }}" alt="{{ $sanPham->TenSanPham }}" class="img-thumbnail" style="width: 100px;">
                <span>{{ $sanPham->TenSanPham }}, </span>
                <span>Loại: {{ $sanPham->MaLoaiSP }},</span>
                <span>Giá: {{ number_format($sanPham->Gia, 0, ',', '.') }} VNĐ</span>
            </div>
            <div class="item-controls">
                <button class="btn btn-danger btn-sm">Xóa</button>
                <div class="item-quantity">
                    <button class="btn btn-secondary btn-sm decrease" data-id="{{ $item->MaSanPham }}">-</button>
                    <span>{{ $item->SoLuong }}</span>
                    <button class="btn btn-secondary btn-sm increase" data-id="{{ $item->MaSanPham }}">+</button>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <span>Tổng tiền</span>
    <span id="totalPrice"></span>
    <span>VNĐ</span>
    <div></div>
    <div class="mb-3">
        <button class="btn btn-warning">Xóa hết</button>
    </div>

    <div class="pagination">
        {{ $gioHang->links() }} <!-- Hiển thị các liên kết phân trang -->
    </div>

    <div class="shipping-info">
        <h4>Thông tin nhận hàng</h4>
        <form>
            <input type="text" class="form-control" placeholder="Họ và tên">
            <input type="text" class="form-control" placeholder="Địa chỉ">
            <input type="text" class="form-control" placeholder="Số điện thoại">
        </form>
    </div>






    <button class="btn btn-primary">Đặt hàng</button>
</div>
<script>
    // Gọi phương thức calculateTotalPrice khi trang được tải
    fetch('/cart/total')
        .then(response => response.json())
        .then(data => {
            document.getElementById('totalPrice').innerText = data.total ? data.total.toLocaleString() : 0;
        });
</script>
<script>
    document.querySelectorAll('.increase').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const quantitySpan = this.parentElement.querySelector('span');
            let currentQuantity = parseInt(quantitySpan.innerText);
            currentQuantity++;
            quantitySpan.innerText = currentQuantity;
            updateTotalPrice();
            updateDatabaseQuantity(productId, currentQuantity);
        });
    });

    document.querySelectorAll('.decrease').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const quantitySpan = this.parentElement.querySelector('span');
            let currentQuantity = parseInt(quantitySpan.innerText);
            if (currentQuantity > 1) {
                currentQuantity--;
                quantitySpan.innerText = currentQuantity;
                updateTotalPrice();
                updateDatabaseQuantity(productId, currentQuantity);
            }
        });
    });

    function updateTotalPrice() {
        fetch('/cart/total')
            .then(response => response.json())
            .then(data => {
                document.getElementById('totalPrice').innerText = data.total ? data.total.toLocaleString() : 0;
            });
    }

    function updateDatabaseQuantity(productId, quantity) {
        fetch(`/cart/update/${productId}`, {
            method: 'POST',
            body: JSON.stringify({ quantity: quantity }),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Thêm token CSRF
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
            } else {
                console.log(data.success);
            }
        });
    }

    // Gọi phương thức calculateTotalPrice khi trang được tải
    updateTotalPrice();
</script>
@endsection