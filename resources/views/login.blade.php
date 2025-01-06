<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="{{ asset('css/Auth.css') }}">
</head>
<body>
    <div class="container">
        <h2>Đăng Nhập</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="TenDangNhap">Tên Đăng Nhập:</label>
                <input type="text" name="TenDangNhap" id="TenDangNhap" required>
            </div>
            <div class="form-group">
                <label for="MatKhau">Mật Khẩu:</label>
                <input type="password" name="MatKhau" id="MatKhau" required>
            </div>
            <button type="submit">Đăng Nhập</button>
        </form>
        <p>Chưa có tài khoản? <a href="{{ route('register.form') }}">Đăng Ký</a></p>
    </div>
</body>
</html>