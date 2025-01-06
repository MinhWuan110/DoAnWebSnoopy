<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Khách Hàng</title>
    <link rel="stylesheet" href="{{ asset('css/Auth.css') }}">
</head>
<body>
    <div class="container">
        <h2>Đăng Ký Khách Hàng</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="MaKhachHang">Mã Khách Hàng:</label>
                <input type="text" name="MaKhachHang" id="MaKhachHang" required>
            </div>
            <div class="form-group">
                <label for="HoTen">Họ Tên:</label>
                <input type="text" name="HoTen" id="HoTen" required>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" name="Email" id="Email" required>
            </div>
            <div class="form-group">
                <label for="SoDienThoai">Số Điện Thoại:</label>
                <input type="text" name="SoDienThoai" id="SoDienThoai" required>
            </div>
            <div class="form-group">
                <label for="DiaChi">Địa Chỉ:</label>
                <input type="text" name="DiaChi" id="DiaChi" required>
            </div>
            <div class="form-group">
                <label for="MatKhau">Mật Khẩu:</label>
                <input type="password" name="MatKhau" id="MatKhau" required>
            </div>
            <div class="form-group">
                <label for="MatKhau_confirmation">Xác Nhận Mật Khẩu:</label>
                <input type="password" name="MatKhau_confirmation" id="MatKhau_confirmation" required>
            </div>
            <button type="submit">Đăng Ký</button>
        </form>
        <p>Đã có tài khoản? <a href="{{ route('login.form') }}">Đăng Nhập</a></p>
    </div>
</body>
</html>