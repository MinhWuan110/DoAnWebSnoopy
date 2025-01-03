<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 50px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-btn {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="text-center">Đăng Nhập</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">EMAIL HOẶC SỐ ĐIỆN THOẠI</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">MẬT KHẨU</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn login-btn btn-block">ĐĂNG NHẬP</button>
            <div class="text-center">
                <a href="#">Quên mật khẩu?</a>
            </div>
        </form>
    </div>
</body>
</html>