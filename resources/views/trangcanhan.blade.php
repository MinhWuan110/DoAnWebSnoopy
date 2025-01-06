@extends('layouts.User')
@section('title', 'Trang Cá Nhân')
@section('content')
<div class="container">
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('updateProfile', isset($khachhang) ? $khachhang->MaKhachHang : $nhanvien->MaNV) }}" method="POST">
        @csrf
        @method('PUT')

        @if(isset($khachhang))
        <h2 class="d">Thông tin cá nhân</h2>
            <div class="form-group">
                <label for="name" class="s">Tên:</label>
                <input type="text" class="form-control short-input" id="name" name="name" value="{{ $khachhang->HoTen }}">
            </div>
            <div class="form-group">
                <label for="email" class="s">Email:</label>
                <input type="email" class="form-control short-input" id="email" name="email" value="{{ $khachhang->Email }}">
            </div>
            <div class="form-group">
                <label for="phone" class="s">Số điện thoại:</label>
                <input type="text" class="form-control short-input" id="phone" name="phone" value="{{ $khachhang->SoDienThoai }}">
            </div>
            <div class="form-group">
                <label for="address" class="s">Địa chỉ:</label>
                <input type="text" class="form-control short-input" id="address" name="address" value="{{ $khachhang->DiaChi }}">
            </div>
            <div class="form-group">
                <label for="DiemTL" class="s">Điểm tích lũy:</label>
                <input type="text" class="form-control short-input" id="DiemTL" name="DiemTL" value="{{ $khachhang->DiemTL }}" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
            <h2>Danh sách đơn hàng</h2>
<table class="table">
    <thead>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Trạng thái</th>
            <th>Ngày đặt</th>
            <th>Ngày giao dự kiến</th>
            <th>Ngày giao thực tế</th>
            <th>Tổng tiền</th>
            <th>Ghi chú</th>
            <th>Phương thức vận chuyển</th>
            <th>Hủy đơn</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($donhangs) && !$donhangs->isEmpty())
            @foreach($donhangs as $donhang)
                <tr>
                    <td>{{ $donhang->MaDonHang }}</td>
                    <td>{{ $donhang->TrangThaiDonHang == 1 ? 'Đang xử lý' : 'Đã giao' }}</td>
                    <td>{{ \Carbon\Carbon::parse($donhang->NgayDatHang)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($donhang->NgayGiaoHangDuKien)->format('d/m/Y') }}</td>
                    <td>{{ $donhang->NgayGiaoHangThucTe ? \Carbon\Carbon::parse($donhang->NgayGiaoHangThucTe)->format('d/m/Y') : 'Chưa giao' }}</td>
                    <td>{{ number_format($donhang->TongTien, 0, ',', '.') }} VNĐ</td>
                    <td>{{ $donhang->GhiChu }}</td>
                    <td>{{ $donhang->TenPhuongThuc }}</td>
                    <td><button class="btn btn-danger">Hủy</button></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9" class="text-center">Chưa có đơn hàng nào.</td>
            </tr>
        @endif
    </tbody>
</table>
            <br>
            <h2>Danh sách sản phẩm yêu thích, đánh giá</h2>
<table class="table">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Đánh giá</th>
            <th>Ngày đánh giá</th>
            <th>Giá</th>
            <th>Tình trạng</th>
            <th>Bình luận</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhgiasanpham as $danhgia)
            <tr>
                <td>{{ $danhgia->TenSanPham }}</td>
                <td>{{ $danhgia->XepHang }}/5</td> <!-- Xuất sắc -->
                <td>{{ \Carbon\Carbon::parse($danhgia->NgayDanhGia)->format('d/m/Y') }}</td>
                <td>{{ number_format($danhgia->Gia, 0, ',', '.') }} VNĐ</td>
                <td>{{ $danhgia->TrangThai == 1 ? 'Còn hàng' : 'Hết hàng' }}</td>
                <td>{{ $danhgia->BinhLuan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
            </div>
        @elseif(isset($nhanvien))
        <h2 class="d">Thông tin cá nhân nhân viên</h2>
            <div class="form-group">
                <label for="name" class="s">Tên:</label>
                <input type="text" class="form-control short-input" id="name" name="name" value="{{ $nhanvien->HoTen }}">
            </div>
            <div class="form-group">
                <label for="cccd" class="s">CCCD:</label>
                <input type="text" class="form-control short-input" id="cccd" name="cccd" value="{{ $nhanvien->CCCD }}">
            </div>
            <div class="form-group">
                <label for="gender" class="s">Giới tính:</label>
                <select class="form-control short-input" id="gender" name="gender">
                    <option value="1" {{ $nhanvien->GioiTinh == 1 ? 'selected' : '' }}>Nam</option>
                    <option value="0" {{ $nhanvien->GioiTinh == 0 ? 'selected' : '' }}>Nữ</option>
                </select>
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
                <input type="text" class="form-control short-input" id="address" name="address" value="{{ $nhanvien->DiaChi }}">
            </div>
            <div class="form-group">
                <label for="phone" class="s">Số điện thoại:</label>
                <input type="text" class="form-control short-input" id="phone" name="phone" value="{{ $nhanvien->SoDienThoai }}">
            </div>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        @else
            <p class="text-danger">Không tìm thấy thông tin cá nhân.</p>
        @endif

        
    </form>
</div>

</div>
@endsection