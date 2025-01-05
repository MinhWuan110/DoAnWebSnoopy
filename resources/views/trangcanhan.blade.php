@extends('layouts.User')
@section('title', 'Trang Cá Nhân')
@section('content')
<div class="container">
<div class="container">
    <h2 class="d">Thông tin cá nhân</h2>
    <form>
        @if(isset($khachhang))
            <div class="form-group">
                <label for="name" class="s">Tên:</label>
                <input type="text" class="form-control short-input" id="name" name="name" value="{{ $khachhang->HoTen }}" readonly>
            </div>
            <div class="form-group">
                <label for="email" class="s">Email:</label>
                <input type="email" class="form-control short-input" id="email" name="email" value="{{ $khachhang->Email }}" readonly>
            </div>
            <div class="form-group">
                <label for="phone" class="s">Số điện thoại:</label>
                <input type="text" class="form-control short-input" id="phone" name="phone" value="{{ $khachhang->SoDienThoai }}" readonly>
            </div>
            <div class="form-group">
                <label for="address" class="s">Địa chỉ:</label>
                <input type="text" class="form-control short-input" id="address" name="address" value="{{ $khachhang->DiaChi }}" readonly>
            </div>
            <div class="form-group">
                <label for="DiemTL" class="s">Điểm tích lũy:</label>
                <input type="text" class="form-control short-input" id="DiemTL" name="DiemTL" value="{{ $khachhang->DiemTL }}" readonly>
            </div>
            <h2>Danh sách đơn hàng</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>                  
                        <th>Hủy đơn</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>Đang xử lý</td>
                        <td>11/11/2024</td>
                        <td>100.000 VNĐ</td>
                         <td><button class="btn btn-danger">Hủy</button></td>
                    </tr>
                    <tr>
                        <td>#002</td>
                        <td>Đã giao</td>
                        <td>10/11/2024</td>
                        <td>200.000 VNĐ</td>
                        <td><button class="btn btn-danger">Hủy</button></td>
                    </tr>
                </tbody>
            </table>

            <h2>Danh sách sản phẩm yêu thích</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Đánh giá</th>
                        <th>Ngày đánh giá</th>
                        <th>Giá</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sản phẩm A</td>
                        <td>5/5</td> <!-- Xuất sắc -->
                        <td>12/11/2024</td>
                        <td>150.000 VNĐ</td>
                        <td>Còn hàng</td>
                    </tr>
                    <tr>
                        <td>Sản phẩm B</td>
                        <td>4/5</td> <!-- Tốt -->
                        <td>13/11/2024</td>
                        <td>300.000 VNĐ</td>
                        <td>Hết hàng</td>
                 </tr>
                </tbody>
            </table>
        @elseif(isset($nhanvien))
            <div class="form-group">
                <label for="name" class="s">Tên:</label>
                <input type="text" class="form-control short-input" id="name" name="name" value="{{ $nhanvien->HoTen }}" readonly>
            </div>
            <div class="form-group">
                <label for="cccd" class="s">CCCD:</label>
                <input type="text" class="form-control short-input" id="cccd" name="cccd" value="{{ $nhanvien->CCCD }}" readonly>
            </div>
            <div class="form-group">
                <label for="gender" class="s">Giới tính:</label>
                <input type="text" class="form-control short-input" id="gender" name="gender" value="{{ $nhanvien->GioiTinh == 1 ? 'Nam' : 'Nữ' }}" readonly>
            </div>
            <div class="form-group">
                <label for="position" class="s">Chức vụ:</label>
                <input type="text" class="form-control short-input" id="position" name="position" value="{{ $nhanvien->ChucVu }}" readonly>
            </div>
            <div class="form-group">
                <label for="startDate" class="s">Ngày vào làm:</label>
                <input type="date" class="form-control short-input" id="startDate" name="startDate" value="{{ $nhanvien->NgayVaoLam }}" readonly>
            </div>
            <div class="form-group">
                <label for="address" class="s">Địa chỉ:</label>
                <input type="text" class="form-control short-input" id="address" name="address" value="{{ $nhanvien->DiaChi }}" readonly>
            </div>
            <div class="form-group">
                <label for="phone" class="s">Số điện thoại:</label>
                <input type="text" class="form-control short-input" id="phone" name="phone" value="{{ $nhanvien->SoDienThoai }}" readonly>
            </div>
            <div class="form-group">
                <label for="status" class="s">Trạng thái:</label>
                <input type="text" class="form-control short-input" id="status" name="status" value="{{ $nhanvien->TrangThai == 1 ? 'Hoạt động' : 'Ngừng hoạt động' }}" readonly>
            </div>
        @else
            <p class="text-danger">Không tìm thấy thông tin cá nhân.</p>
        @endif
    </form>
</div>
</div>
@endsection