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
    </div></div>

    <div class="cart-items">
    <div class="cart-item d-flex justify-content-between align-items-center">
    <div class="item-info">
        <img src="path/to/image1.jpg" alt="Đơn hàng 1" class="img-thumbnail" style="width: 100px;">
        <span>Đơn hàng 1</span>
        <span>Loại: Loại A</span>
    </div>
    <div class="item-controls">
        <button class="btn btn-danger btn-sm">Xóa</button>
        <div class="item-quantity">
            <button class="btn btn-secondary btn-sm">-</button>
            <span>1</span>
            <button class="btn btn-secondary btn-sm">+</button>
        </div>
    </div>
</div>

<div class="cart-item d-flex justify-content-between align-items-center">
    <div class="item-info">
        <img src="path/to/image1.jpg" alt="Đơn hàng 2" class="img-thumbnail" style="width: 100px;">
        <span>Đơn hàng 1</span>
        <span>Loại: Loại B</span>
    </div>
    <div class="item-controls">
        <button class="btn btn-danger btn-sm">Xóa</button>
        <div class="item-quantity">
            <button class="btn btn-secondary btn-sm">-</button>
            <span>1</span>
            <button class="btn btn-secondary btn-sm">+</button>
        </div>
    </div>
</div>

<div class="cart-item d-flex justify-content-between align-items-center">
    <div class="item-info">
        <img src="path/to/image1.jpg" alt="Đơn hàng 3" class="img-thumbnail" style="width: 100px;">
        <span>Đơn hàng 1</span>
        <span>Loại: Loại C</span>
    </div>
    <div class="item-controls">
        <button class="btn btn-danger btn-sm">Xóa</button>
        <div class="item-quantity">
            <button class="btn btn-secondary btn-sm">-</button>
            <span>1</span>
            <button class="btn btn-secondary btn-sm">+</button>
        </div>
    </div>
</div>

    <div class="mb-3">
        <button class="btn btn-warning">Xóa hết</button>
    </div>

    <div class="shipping-info">
        <h4>Thông tin nhận hàng</h4>
        <form>
            <input type="text" class="form-control" placeholder="Họ và tên">
            <input type="text" class="form-control" placeholder="Địa chỉ">
            <input type="text" class="form-control" placeholder="Số điện thoại">
        </form>
    </div>

    <div class="total-price">
        <h4>Tổng tiền: 500.000 VNĐ</h4>
    </div>

    <button class="btn btn-primary">Đặt hàng</button>
</div>
@endsection