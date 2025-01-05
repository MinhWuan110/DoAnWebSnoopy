@extends('layouts.admin')

@section('title', 'Quản Lý Bình Luận')

@section('content')
<link rel="stylesheet" href="{{ asset('css/QLBinhLuan.css') }}"> 
<div class="container">
    <div class="search-section">
        <h2>Tìm Kiếm Bình Luận</h2>
        <form class="search-form">
            <label for="customer-id">Tìm Kiếm Bình Luận Qua Mã Khách Hàng</label>
            <input type="text" id="customer-id" placeholder="Nhập mã khách hàng" />
            <button type="button" class="filter-button">Hiển Thị Tất Cả</button>
            <div class="date-section">
                <label for="date">Nhập Giới Giới Hạn Ngày Giờ</label>
                <input type="datetime-local" id="date" />
                <span class="current-date">Jun 10, 2024 9:41 AM</span>
            </div>
        </form>
    </div>

    <div class="comment-section">
        <h2>Danh Sách Các Bình Luận</h2>
        <table>
            <thead>
                <tr>
                    <th>Mã Khách Hàng</th>
                    <th>Email</th>
                    <th>Nội Dung Bình Luận</th>
                    <th>Ngày Gửi</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>KH001</td>
                    <td>khachhang1@example.com</td>
                    <td>Sản phẩm rất tốt!</td>
                    <td>Jun 10, 2024</td>
                    <td><button class="delete-button">Xóa</button></td>
                </tr>
                <tr>
                    <td>KH002</td>
                    <td>khachhang2@example.com</td>
                    <td>Giao hàng nhanh chóng.</td>
                    <td>Jun 09, 2024</td>
                    <td><button class="delete-button">Xóa</button></td>
                </tr>
                <!-- Thêm các bình luận khác ở đây -->
            </tbody>
        </table>
    </div>
</div>
@endsection