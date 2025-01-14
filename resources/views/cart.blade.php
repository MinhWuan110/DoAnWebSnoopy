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
                        <button class="btn btn-secondary btn-sm">-</button>
                        <span>{{ $item->SoLuong }}</span>
                        <button class="btn btn-secondary btn-sm">+</button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

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

    @php
        $totalPrice = 0;
        $discount = isset($discount) ? $discount : 0; // Khởi tạo biến discount

        foreach ($gioHang as $item) {
            $sanPham = $sanPhamDetails->firstWhere('MaSanPham', $item->MaSanPham);
            $totalPrice += $sanPham->Gia * $item->SoLuong;
        }

        // Kiểm tra xem giỏ hàng có sản phẩm hay không
        if (count($gioHang) > 0) {
            $totalPriceAfterDiscount = $totalPrice * (1 - $discount);
        } else {
            $totalPriceAfterDiscount = 0; // Hoặc một giá trị khác nếu bạn muốn
        }
    @endphp

    <div class="total-price">
        <p>Tổng tiền: {{ number_format($totalPriceAfterDiscount, 0, ',', '.') }} VNĐ</p>
    </div>

    <button class="btn btn-primary">Đặt hàng</button>
</div>
@endsection