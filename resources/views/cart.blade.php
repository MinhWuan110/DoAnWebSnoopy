@extends('layouts.User') <!-- Kết nối với layout chính -->
@section('title', 'Giỏ Hàng')

@section('content')
<div class="container">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h2>Giỏ hàng</h2>
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
                <form action="{{ route('cart.remove', $item->MaSanPham) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')">Xóa</button>
                </form>
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


    <div class="mb-3">
        <form action="{{ route('cart.clear') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có chắc chắn muốn xóa hết sản phẩm trong giỏ hàng?')">Xóa hết</button>
        </form>
    </div>

    <div class="pagination">
        {{ $gioHang->links() }} <!-- Hiển thị các liên kết phân trang -->
    </div>

    <span>Tổng tiền</span>
    <span id="totalPrice"></span>
    <span>VNĐ</span>
    <div></div>
    <button class="btn btn-primary" style="display: block; margin: 0 auto;">Đặt hàng</button>
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
                body: JSON.stringify({
                    quantity: quantity
                }),
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