@extends('layouts.User')

@section('content')
    <html>

    <head>
        <link rel="stylesheet" href="{{ asset('css/ThongTinCongty.css') }}">
    </head>

    <body>



        <?php
        // Kết nối tới cơ sở dữ liệu MySQL
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'test_db';
        
        // Tạo kết nối
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die('Kết nối thất bại: ' . $conn->connect_error);
        }
        
        // Truy vấn dữ liệu từ bảng ThongTinCongTy
        $sql = 'SELECT * FROM ThongTinCongTy';
        $result = $conn->query($sql);
        
        // Kiểm tra nếu có dữ liệu trả về
        $companyInfo = null; // Tạo biến để lưu thông tin công ty
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $companyInfo = $row; // Lưu thông tin vào biến
            }
        }
        // Đóng kết nối
        $conn->close();
        ?>

        <div class="section">
            <div class="section-title">Địa chỉ</div>
            <div class="section-content">
                <p><?php echo htmlspecialchars($companyInfo['DiaChi'] ?? 'Thông tin địa chỉ chưa có'); ?></p>
            </div>
        </div>


        <div class="section">
            <div class="section-title">Thông tin về công ty</div>
            <div class="section-content">
                <p><?php echo htmlspecialchars($companyInfo['GioiThieu'] ?? 'Thông tin địa chỉ chưa có'); ?></p>
            </div>
        </div>












        <div class="section">
            <div class="section-title">Các chính sách của công ty</div>
            <div class="section-content">

                <?php
                if ($result->num_rows > 0) {
                    echo '<p>' . nl2br(htmlspecialchars($companyInfo['ChinhSachCongTy'])) . '</p>';
                    echo '</div>';
                } else {
                    echo 'Không có thông tin công ty nào.';
                }
                ?>
            </div>
            <div class="section">
                <div class="section-title">Lĩnh vực chính</div>
                <div class="section-content">

                    <?php
                    if ($result->num_rows > 0) {
                        echo '<p>' . nl2br(htmlspecialchars($companyInfo['LinhVuc'])) . '</p>';
                        echo '</div>';
                    } else {
                        echo 'Không có thông tin công ty nào.';
                    }
                    ?>
                </div>





                <div class="section">
                    <div class="section-title">Chăm sóc khách hàng </div>
                    <div class="section-content">

                        <?php
                        if ($result->num_rows > 0) {
                            echo '<p>' . nl2br(htmlspecialchars($companyInfo['ChamSocKhachHang'])) . '</p>';
                            echo '</div>';
                        } else {
                            echo 'Không có thông tin công ty nào.';
                        }
                        ?>
                    </div>
                </div>

            </div>






    </body>

    </html>
@endsection
