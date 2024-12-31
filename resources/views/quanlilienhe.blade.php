@extends('layouts.admin')

@section('title', 'Quản Lý Liên Hệ')

@section('content')
<div class="container">
    <div class="search-section">
        <h2>Tìm Kiếm Liên Hệ</h2>
       <form class="search-form">
            <label for="customer-id">Tìm Kiếm Liên Hệ Qua Mã Khách Hàng</label>
            <input type="text" id="customer-id" placeholder="Nhập mã khách hàng" />

            <label for="email">Tìm Kiếm Liên Hệ Qua Email</label>
            <input type="email" id="email" placeholder="Nhập email" />

            <label for="phone">Tìm Kiếm Liên Hệ Qua Số Điện Thoại</label>
            <input type="tel" id="phone" placeholder="Nhập số điện thoại" />

            <label for="address">Tìm Kiếm Liên Hệ Qua Địa Chỉ</label>
            <input type="text" id="address" placeholder="Nhập địa chỉ" />

            <button type="button" class="filter-button">Hiển Thị Tất Cả</button>
        </form>
    </div>

    <div class="contact-section">
        <h2>Danh Sách Liên Hệ</h2>
        <table>
            <thead>
                <tr>
                    <th>Mã Khách Hàng</th>
                    <th>Email</th>
                    <th>Nội Dung Liên Hệ</th>
                    <th>Ngày Gửi</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>KH001</td>
                    <td>khachhang1@example.com</td>
                    <td>Cần hỗ trợ về sản phẩm.</td>
                    <td>Jun 10, 2024</td>
                    <td><button class="delete-button">Xóa</button></td>
                </tr>
                <tr>
                    <td>KH002</td>
                    <td>khachhang2@example.com</td>
                    <td>Yêu cầu thông tin thêm.</td>
                    <td>Jun 09, 2024</td>
                    <td><button class="delete-button">Xóa</button></td>
                </tr>
                <!-- Thêm các liên hệ khác ở đây -->
            </tbody>
        </table>
    </div>
</div>
@endsection