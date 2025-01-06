@extends('layouts.User')

@section('title', 'trangchu')

@section('content')
    <html>

    <head>
        <link rel="stylesheet" href="{{ asset('css/trangchu.css') }}">

        <title>
            Product Page
        </title>

    </head>

    <body>
        <div class="container">
            <div class="header">
                <p class="header">QUẢNG CÁO</p>
            </div>
            <div class="banner">
                <img alt="."
                    src="https://file.hstatic.net/200000722513/file/thang_11_web_slider_800x400_laptop_gaming.png" />
            </div>


            <body>
                <div class="container">
                    <div class="title">
                        SẢN PHẨM NỔI BẬT
                    </div>

                    <div class="product-list">
                        <?php
            // Kết nối tới cơ sở dữ liệu MySQL
            $servername = "localhost";  // Thay đổi nếu cần
            $username = "root";         // Thay đổi nếu cần
            $password = "123456";             // Thay đổi nếu cần
            $dbname = "test_db";        // Thay đổi tên cơ sở dữ liệu nếu cần

            // Tạo kết nối
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Truy vấn lấy 4 sản phẩm có lượt bán cao nhất
            $sql = "SELECT MaSanPham, TenSanPham, Gia, MaLoaiSP, SoLuong, MaNhaCungCap, TrangThai, SPdaban FROM sanpham ORDER BY SPdaban DESC LIMIT 4";
            $result = $conn->query($sql);

            // Kiểm tra nếu có dữ liệu trả về
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="product-item">
                            <img alt="Placeholder image of a product" height="200"
                                src="https://storage.googleapis.com/a1aa/image/co6APYIgHqJhGZIOkpzs2eXRlbEPZYOUIel8w1Lc5Agaxz1TA.jpg"
                                width="200" />
                            <div class="description">
                                <p><?php echo $row['TenSanPham']; ?></p> <!-- Hiển thị tên sản phẩm -->
                            </div>
                            <div class="price">
                                <a><?php echo $row['Gia']; ?> VND</a> <!-- Hiển thị giá -->
                            </div>
                            <div class="promotion">
                                Khuyến mãi
                            </div>
                            <div class="quantity">
                                Số lượng: <p><?php echo $row['SoLuong']; ?></p><!-- Thêm thông tin số lượng -->
                            </div>
                        </div>
                        <?php
                }
            } else {
                echo "Không có sản phẩm nào.";
            }

        
            ?>
                    </div>
                </div>
            </body>





            <body>
                <div class="container">
                    <div class="title">
                        SẢN PHẨM KHUYẾN MÃI
                    </div>

                    <div class="product-list">
                        <?php
          

            // Truy vấn lấy 4 sản phẩm đang khuyến mãimãi
                      $sql = "SELECT sp.MaSanPham, sp.TenSanPham, sp.Gia,sp.SoLuong, km.MaKhuyenMai, km.TenKhuyenMai, km.NgayBatDau, km.NgayKetThuc
        FROM SanPham sp
        JOIN sanphamkhuyenmai spkm ON sp.MaSanPham = spkm.MaSanPham
        JOIN khuyenmai km ON spkm.MaKhuyenMai = km.MaKhuyenMai
        WHERE km.NgayKetThuc > NOW()
        LIMIT 4";



            $result = $conn->query($sql);

            // Kiểm tra nếu có dữ liệu trả về
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="product-item">
                            <img alt="Placeholder image of a product" height="200"
                                src="https://storage.googleapis.com/a1aa/image/co6APYIgHqJhGZIOkpzs2eXRlbEPZYOUIel8w1Lc5Agaxz1TA.jpg"
                                width="200" />
                            <div class="description">
                                <p><?php echo $row['TenSanPham']; ?></p> <!-- Hiển thị tên sản phẩm -->
                            </div>
                            <div class="price">
                                <a><?php echo $row['Gia']; ?> VND</a> <!-- Hiển thị giá -->
                            </div>
                            <div class="promotion">
                                Khuyến mãi
                            </div>
                            <div class="quantity">
                                Số lượng: <p><?php echo $row['SoLuong']; ?></p><!-- Thêm thông tin số lượng -->
                            </div>
                        </div>
                        <?php
                }
            } else {
                echo "Không có sản phẩm nào.";
            }

            // Đóng kết nối
          
            ?>
                    </div>
                </div>
            </body>




            <body>
                <div class="container">
                    <div class="title">
                        SẢN PHẨM BÁN CHẠY
                    </div>

                    <div class="product-list">
                        <?php
          

            // Truy vấn lấy 4 sản phẩm có lượt bán cao nhất
               $sql = "SELECT MaSanPham, TenSanPham, SPdaban, Gia, MaLoaiSP, SoLuong, MaNhaCungCap, TrangThai 
        FROM SanPham 
        ORDER BY SPdaban DESC 
        LIMIT 4";
            $result = $conn->query($sql);
       

            // Kiểm tra nếu có dữ liệu trả về
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="product-item">
                            <img alt="Placeholder image of a product" height="200"
                                src="https://storage.googleapis.com/a1aa/image/co6APYIgHqJhGZIOkpzs2eXRlbEPZYOUIel8w1Lc5Agaxz1TA.jpg"
                                width="200" />
                            <div class="description">
                                <p><?php echo $row['TenSanPham']; ?></p> <!-- Hiển thị tên sản phẩm -->
                            </div>
                            <div class="price">
                                <a><?php echo $row['Gia']; ?> VND</a> <!-- Hiển thị giá -->
                            </div>
                            <div class="promotion">
                                Khuyến mãi
                            </div>
                            <div class="quantity">
                                Số lượng: <p><?php echo $row['SoLuong']; ?></p><!-- Thêm thông tin số lượng -->
                            </div>
                        </div>
                        <?php
                }
            } else {
                echo "Không có sản phẩm nào.";
            }

            // Đóng kết nối
            
            ?>
                    </div>
                </div>
            </body>

            <body>
                <div class="container">
                    <div class="title">
                        SẢN PHẨM MỚI
                    </div>

                    <div class="product-list">
                        <?php
          

            // Truy vấn lấy 4 sản phẩm có lượt bán cao nhất
            
            $sql = "SELECT MaSanPham, ThoiDiemRaMat 
        FROM ChiTietSanPham 
        ORDER BY ThoiDiemRaMat DESC 
        LIMIT 4";
        $result = $conn->query($sql);


            //      $sql = "SELECT MaSanPham, TenSanPham, Gia, MaLoaiSP, SoLuong, MaNhaCungCap, TrangThai, SPdaban FROM sanpham ORDER BY SPdaban DESC LIMIT 4";
            // $result = $conn->query($sql);

            // Kiểm tra nếu có dữ liệu trả về
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    $maSanPham = $row['MaSanPham'];
    $sqlSanPham = "SELECT TenSanPham, Gia, MaLoaiSP, SoLuong, MaNhaCungCap, TrangThai 
                   FROM SanPham 
                   WHERE MaSanPham = '$maSanPham'";
    $resultSanPham = $conn->query($sqlSanPham);
    $sanPham = $resultSanPham->fetch_assoc(); 
    ?>
                        <div class="product-item">
                            <img alt="Placeholder image of a product" height="200"
                                src="https://storage.googleapis.com/a1aa/image/co6APYIgHqJhGZIOkpzs2eXRlbEPZYOUIel8w1Lc5Agaxz1TA.jpg"
                                width="200" />
                            <div class="description">
                                <p><?php echo $sanPham['TenSanPham']; ?></p>
                            </div>
                            <div class="price">
                                <a><?php echo $sanPham['Gia']; ?> VND</a> <!-- Hiển thị giá -->
                            </div>
                            <div class="promotion">
                                Khuyến mãi
                            </div>
                            <div class="quantity">
                                Số lượng: <p><?php echo $sanPham['SoLuong']; ?></p><!-- Thêm thông tin số lượng -->
                            </div>
                        </div>
                        <?php
                }
            } else {
                echo "Không có sản phẩm nào.";
            }

            // Đóng kết nối
            $conn->close();
            ?>
                    </div>
                </div>
            </body>
    </body>

    </html>

@endsection
