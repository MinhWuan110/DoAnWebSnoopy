@extends('layouts.admin')
@section('title', 'Quản Lý Đơn Hàng')
@section('content')
<div class="container mt-5" style="background-color: #f0f0f0; padding: 20px; border-radius: 8px;">
    <h1 class="text-center">Tìm kiếm đơn hàng</h1>
    
    <div class="form-group d-flex align-items-center">
        <div class="input-group">
            <input type="text" class="form-control" id="order-code" placeholder="Nhập mã đơn hàng">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <button class="btn btn-success ml-2" style="background-color: #28a745; color: white;">Hiện thị tất cả</button>
        <button class="btn btn-light ml-2" style="border: 1px solid #ccc;">
            <i class="fa fa-filter"></i></button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên đơn hàng</th>
                <th>Trạng Thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#001</td>
                <td>Đơn hàng A</td>
                <td>Đang xử lý</td>
                <td>
                    <button class="btn btn-warning">Cập nhật</button>
                    <button class="btn btn-danger">Xóa</button>
                </td>
            </tr>
            <tr>
                <td>#002</td>
                <td>Đơn hàng B</td>
                <td>Đã giao</td>
                <td>
                    <button class="btn btn-warning">Cập nhật</button>
                    <button class="btn btn-danger">Xóa</button>
                </td>
            </tr>
            {{-- Thêm các đơn hàng khác tại đây --}}
        </tbody>
    </table>
</div>
@endsection