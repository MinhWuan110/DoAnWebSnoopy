@extends('layouts.User')
@section('title', 'Trang Cá Nhân')
@section('content')
<div class="container">
    <h2 class="d">Thông tin cá nhân</h2>
    <form>
        <div class="form-group">
            <label for="name" class="s">Tên:</label>
            <input type="text" class="form-control short-input" id="name" placeholder="Nhập tên">
        </div>
        <div class="form-group">
            <label for="email" class="s">Email:</label>
            <input type="email" class="form-control short-input" id="email" placeholder="Nhập email">
        </div>
        <div class="form-group">
            <label for="phone" class="s">Số điện thoại:</label>
            <input type="text" class="form-control short-input" id="phone" placeholder="Nhập số điện thoại">
        </div>
        <div class="form-group">
            <label for="address" class="s">Địa chỉ:</label>
            <input type="text" class="form-control short-input" id="address" placeholder="Nhập địa chỉ">
        </div>
        <div class="form-group">
            <label for="dateOfBirth" class="s">Ngày sinh:</label>
            <input type="date" class="form-control short-input" id="dateOfBirth">
        </div>
        <div class="form-group">
            <label class="s">Giới tính:</label>
            <select class="form-control short-input" id="gender">
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
            </select>
        </div>
    </form>

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

    <h2>Danh sách đơn hàng đã mua</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Trạng thái</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Tình trạng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#003</td>
                <td>Hoàn thành</td>
                <td>12/11/2024</td>
                <td>150.000 VNĐ</td>
                <td>Đã nhận hàng</td>
            </tr>
            <tr>
                <td>#004</td>
                <td>Hoàn thành</td>
                <td>13/11/2024</td>
                <td>300.000 VNĐ</td>
                <td>Đã nhận hàng</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection