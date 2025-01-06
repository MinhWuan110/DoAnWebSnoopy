@extends('layouts.User')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<div class="container">
    <div class="product-image">
        <div class="product-title">
            {{$viewData['sanPham']->TenSanPham}}
        </div>
        <div class="slider-container">
            <div class="slider">
            @foreach ($viewData['hinhAnhSanPham'] as $hinhAnh)
                <div class="slide"><img src="{{asset($hinhAnh->DuongDanHinhAnh)}}" alt="Image 1"></div>
            @endforeach    
            </div>
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
        </div>
        <div class="container-1">
            <div class="header">Thế Giới Di Động cam kết</div>
            <div class="item">
                <i class="fas fa-box"></i>
                <p>Bộ sản phẩm gồm: Hộp, Sách hướng dẫn, Cây lấy sim, Ốp lưng, Cáp Type C, Củ sạc nhanh rời đầu Type A</p>
            </div>
            <div class="item">
                <i class="fas fa-sync-alt"></i>
                <p>Hư gì đổi nấy <strong>12 tháng</strong> tại 2965 siêu thị toàn quốc (miễn phí tháng đầu) <a href="#">Xem chi tiết</a></p>
            </div>
            <div class="item">
                <i class="fas fa-shield-alt"></i>
                <p>Bảo hành <strong>chính hãng điện thoại 18 tháng</strong> tại các trung tâm bảo hành hãng <a href="#">Xem địa chỉ bảo hành</a></p>
            </div>
        </div>
        <div>
            <div class="button-container">
                <div class="button active">Thông số kỹ thuật</div>
                <!-- <div class="button">Bài viết đánh giá</div> -->
            </div>
            <img src="https://cdn.tgdd.vn/Products/Images/42/327343/Kit/xiaomi-poco-m6-note.jpg" alt="">
        </div>
        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-header">
                    Cấu hình & Bộ nhớ
                    <span class="accordion-icon">&#9662;</span>
                </div>
                <div class="accordion-content">
                    <!-- Content for Cấu hình & Bộ nhớ -->
                    <div class="content">
                        <div class="row">
                            <div class="label">Hệ điều hành:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->HeDieuHanh}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Chip xử lý (CPU):</div>
                            <div class="value">{{$viewData['chiTietSanPham']->CPU}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Tốc độ CPU:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->SpeedCPU}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Chip đồ họa (GPU):</div>
                            <div class="value"><a href="#">{{$viewData['chiTietSanPham']->GPU}}</a></div>
                        </div>
                        <div class="row">
                            <div class="label">RAM:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->RAM}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Dung lượng lưu trữ:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->DungLuongLuuTru}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Dung lượng còn lại (khả dụng) khoảng:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->DungLuongconLai}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Thẻ nhớ:</div>
                            <div class="value"><a href="#">{{$viewData['chiTietSanPham']->HeDieuHanh}}</a></div>
                        </div>
                        <div class="row">
                            <div class="label">Danh bạ:</div>
                            <div class="value">Không giới hạn</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header">
                    Camera & Màn hình
                    <span class="accordion-icon">&#9662;</span>
                </div>
                <div class="accordion-content">
                    <div class="content">
                        <div class="row">
                            <div class="label">Độ phân giải camera sau:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->DoPhanGiaiCameraSau}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Quay phim camera sau:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->QuayPhim}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Đèn Flash camera sau:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->DenFlash}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Tính năng camera sau:</div>
                            <div class="value"><a href="#">{{$viewData['chiTietSanPham']->TinhNangCameraSau}}</a></div>
                        </div>
                        <div class="row">
                            <div class="label">DoPhanGiaiCameraTruoc:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->HeDieuHanh}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Tính năng camera trước:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->TinhNangCameraTruoc}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Công nghệ màn hình:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->CongNgheManHinh}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Độ phân giải màn hình:</div>
                            <div class="value"><a href="#">{{$viewData['chiTietSanPham']->DoPhanGiaiManHinh}}</a></div>
                        </div>
                        <div class="row">
                            <div class="label">Màn hình rộng:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->DoRongManHinh}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Độ sáng tối đa:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->DoSangToiDa}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Mặt kính cảm ứng:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->MatKinhCamUng}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header">
                    Pin & Sạc
                    <span class="accordion-icon">&#9662;</span>
                </div>
                <div class="accordion-content">
                    <div class="content">
                        <div class="row">
                            <div class="label">Dung lượng pin:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->DungLuongPin}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Loại pin:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->LoaiPin}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Hỗ trợ sạc tối đa:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->HoTroSacToiDa}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Sạc kèm theo máy:</div>
                            <div class="value"><a href="#">{{$viewData['chiTietSanPham']->HeDieuHanh}}</a></div>
                        </div>
                        <div class="row">
                            <div class="label">Công nghệ pin:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->CongNghePin}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header">
                    Tiện ích
                    <span class="accordion-icon">&#9662;</span>
                </div>
                <div class="accordion-content">
                    <div class="content">
                        <div class="row">
                            <div class="label">Bảo mật nâng cao:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->BaoMatNangcao}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Tính năng đặc biệt:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->TinhNangDacBiet}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Kháng nước, bụi:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->KhangNuoc}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Ghi âm:</div>
                            <div class="value"><a href="#">{{$viewData['chiTietSanPham']->GhiAm}}</a></div>
                        </div>
                        <div class="row">
                            <div class="label">Radio:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->HeDieuHanh}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Xem phim:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->XemPhim}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Nghe nhạc:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->NgheNhac}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header">
                    Kết nối
                    <span class="accordion-icon">&#9662;</span>
                </div>
                <div class="accordion-content">
                    <div class="content">
                        <div class="row">
                            <div class="label">Mạng di động:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->MangDiDong}}</div>
                        </div>
                        <div class="row">
                            <div class="label">SIM:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->SIM}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Wifi:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->WIFI}}</div>
                        </div>
                        <div class="row">
                            <div class="label">GPS:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->GPS}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Bluetooth:</div>
                            <div class="value"><a href="#">{{$viewData['chiTietSanPham']->Bluetooth}}</a></div>
                        </div>
                        <div class="row">
                            <div class="label">Cổng kết nối/sạc:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->CongSac}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Jack tai nghe:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->JackTaiNghe}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Kết nối khác:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->HeDieuHanh}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header">
                    Thiết kế & Chất liệu
                    <span class="accordion-icon">&#9662;</span>
                </div>
                <div class="accordion-content">
                    <div class="content">
                        <div class="row">
                            <div class="label">Thiết kế:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->ThietKe}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Chất liệu:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->ChatLieu}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Kích thước, khối lượng:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->KichThuoc_KhoiLuong}}</div>
                        </div>
                        <div class="row">
                            <div class="label">Thời điểm ra mắt:</div>
                            <div class="value"><a href="#">{{$viewData['chiTietSanPham']->ThoiDiemRaMat}}</a></div>
                        </div>
                        <div class="row">
                            <div class="label">Hãng:</div>
                            <div class="value">{{$viewData['chiTietSanPham']->Hang}}</div>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
        <!-- rating -->
        <div>
            <div class="rating-header">Đánh giá Điện thoại {{$viewData['sanPham']->TenSanPham}}</div>
            <div class="rating-score">
                2.8
                <div class="stars">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= 4)
                            <span style="color: gold;">&#9733;</span> {{-- Ngôi sao vàng --}}
                        @else
                            <span style="color: gray;">&#9734;</span> {{-- Ngôi sao trống --}}
                        @endif
                    @endfor
                </div>
                <div class="reviews">13 đánh giá</div>
            </div>
            <div class="rating-bar">
                <div class="label">5 <i class="fas fa-star"></i></div>
                <div class="bar">
                    <div class="fill" style="width: 8%;"></div>
                </div>
                <div class="percentage">8%</div>
            </div>
            <div class="rating-bar">
                <div class="label">4 <i class="fas fa-star"></i></div>
                <div class="bar">
                    <div class="fill" style="width: 15%;"></div>
                </div>
                <div class="percentage">15%</div>
            </div>
            <div class="rating-bar">
                <div class="label">3 <i class="fas fa-star"></i></div>
                <div class="bar">
                    <div class="fill" style="width: 38%;"></div>
                </div>
                <div class="percentage">38%</div>
            </div>
            <div class="rating-bar">
                <div class="label">2 <i class="fas fa-star"></i></div>
                <div class="bar">
                    <div class="fill" style="width: 31%;"></div>
                </div>
                <div class="percentage">31%</div>
            </div>
            <div class="rating-bar">
                <div class="label">1 <i class="fas fa-star"></i></div>
                <div class="bar">
                    <div class="fill" style="width: 8%;"></div>
                </div>
                <div class="percentage">8%</div>
            </div>
        </div>
        {{$index = 0}}
        @foreach($viewData['danhGiaSanPham'] as $danhGia)
        {{$index++}}
        <div class="review" >
            <div class="review-header">
                <span class="name">{{$danhGia->HoTen}}</span>
                <span class="verified"><i class="fas fa-check-circle"></i> Đã mua tại TGDD</span>
                <div class="stars">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $danhGia->XepHang)
                            <span style="color: gold;">&#9733;</span> {{-- Ngôi sao vàng --}}
                        @else
                            <span style="color: gray;">&#9734;</span> {{-- Ngôi sao trống --}}
                        @endif
                    @endfor
                </div>
            </div>
            <div class="review-body">
                <p>{{$danhGia->BinhLuan}}</p>
                <p>Ngày đánh giá {{$danhGia->NgayDanhGia}}</p>
            </div>
        </div>
        @endforeach
        <div class="buttons">
            <div class="btn">Xem  đánh giá</div>
            <div class="btn btn-primary">Viết đánh giá</div>
        </div>
    </div>
    <div class="product-details">
        <div class="product-stats">
            <span>
                ĐÃ BÁN 22,2K
            </span>
            <span class="rating">
                <i class="fas fa-star">
                </i>
                4.4(128)
            </span>
            <span class="reviews">
                THÔNG SỐ
            </span>
            <span class="views">
                VIEW 172000
            </span>
            <button class="like-button"><i class="fas fa-thumbs-up"></i> Thích <span>1</span></button>
        </div>
        <div class="product-options">
            <div class="color-option xanh-reu">
                <div class="color-circle"></div>
                <span>Xanh rêu</span>
            </div>
            <div class="color-option den">
                <div class="color-circle"></div>
                <span>Đen</span>
            </div>
        </div>
        <div class="product-price">
            {{$viewData['sanPham']->Gia}}đ
            <!-- <del>
                24.990.000đ
            </del>
            <span class="product-discount">
                -16%
            </span> -->
        </div>
        <div>
            <p id="product-coun">Số lượng sản phẩm: {{$viewData['sanPham']->SoLuong}}</p>
        </div>
        <div class="promotion">
            <div class="title">Khuyến mãi</div>
            <div class="subtitle">Giá và khuyến mãi dự kiến áp dụng đến 23:59 | 30/11</div>
            <div class="item">
                <div class="item-number">1</div>
                <div class="item-text">Tặng Bảo hiểm bảo hành</div>
            </div>
            <div class="item">
                <div class="item-number">2</div>
                <div class="item-text">Phiếu mua hàng áp dụng mua sim 50.000đ</div>
            </div>
            <div class="item">
                <div class="item-number">3</div>
                <div class="item-text">Trả góp 0% qua thẻ tính dụng Galaxy Mumber
                    <!-- <a>Xem chi tiết tại đây</a> -->
                </div>
            </div>
        </div>
        <div class="buttons">
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart">
                </i>
                Thêm vào giỏ
            </button>
            <button class="buy-now">
                Mua ngay
            </button>
        </div>
        <div class="contact">
            Gọi đặt mua 1900 232 460 (8:00 - 21:30)
        </div>
    </div>
</div>
</body>

</html>
<script>
    document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', () => {
            const content = header.nextElementSibling;
            const icon = header.querySelector('.accordion-icon');

            if (content.style.display === 'block') {
                content.style.display = 'none';
                icon.classList.remove('rotate');
            } else {
                document.querySelectorAll('.accordion-content').forEach(item => item.style.display = 'none');
                document.querySelectorAll('.accordion-icon').forEach(icon => icon.classList.remove('rotate'));
                content.style.display = 'block';
                icon.classList.add('rotate');
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.3/echo.iife.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>
    Pusher.logToConsole = true;

    const echo = new Echo({
        broadcaster: 'pusher',
        key: '',
        wsHost: window.location.hostname,
        wsPort: 6001,
        forceTLS: false,
        disableStats: true,
    });

    echo.channel('product-count')
        .listen('ProductCountUpdated', (e) => {
            document.getElementById('product-count').textContent = 
                'Số lượng sản phẩm: ' + e.count;
        });
</script>

@endsection