@extends('layouts.User')

@section('title', 'Trang chủ')

@section('content')
    <html>

    <head>
        <link rel="stylesheet" href="{{ asset('css/trangchu.css') }}">
        <title>Product Page</title>
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




            <div class="title">
                SẢN PHẨM NỔI BẬT
            </div>
            <div class="product-list">
                @forelse($topSanPhams as $sanPham)
                    <div class="product-item">
                        <img alt="Placeholder image of a product" height="200"
                            src="https://storage.googleapis.com/a1aa/image/co6APYIgHqJhGZIOkpzs2eXRlbEPZYOUIel8w1Lc5Agaxz1TA.jpg"
                            width="200" />
                        <div class="description">
                            <p>{{ $sanPham->TenSanPham }}</p>
                        </div>
                        <div class="price">
                            <a>{{ number_format($sanPham->Gia, 0, ',', '.') }} VND</a>
                        </div>
                        <div class="promotion">
                            Khuyến mãi
                        </div>
                        <div class="quantity">
                            Số lượng: <p>{{ $sanPham->SoLuong }}</p>
                        </div>
                    </div>
                @empty
                    <p>Không có sản phẩm nào.</p>
                @endforelse
            </div>




            <div class="title">
                SẢN PHẨM KHUYẾN MÃI
            </div>
            <div class="product-list">
                @forelse($SanPhamKhuyenMais as $sanPham)
                    <div class="product-item">
                        <img alt="Placeholder image of a product" height="200"
                            src="https://storage.googleapis.com/a1aa/image/co6APYIgHqJhGZIOkpzs2eXRlbEPZYOUIel8w1Lc5Agaxz1TA.jpg"
                            width="200" />
                        <div class="description">
                            <p>{{ $sanPham->TenSanPham }}</p>
                        </div>
                        <div class="price">
                            <a>{{ number_format($sanPham->Gia, 0, ',', '.') }} VND</a>
                        </div>
                        <div class="promotion">
                            Khuyến mãi
                        </div>
                        <div class="quantity">
                            Số lượng: <p>{{ $sanPham->SoLuong }}</p>
                        </div>
                    </div>
                @empty
                    <p>Không có sản phẩm nào.</p>
                @endforelse
            </div>







            <div class="title">
                SẢN PHẨM BÁN CHẠY
            </div>
            <div class="product-list">
                @forelse($topSanPhams as $sanPham)
                    <div class="product-item">
                        <img alt="Placeholder image of a product" height="200"
                            src="https://storage.googleapis.com/a1aa/image/co6APYIgHqJhGZIOkpzs2eXRlbEPZYOUIel8w1Lc5Agaxz1TA.jpg"
                            width="200" />
                        <div class="description">
                            <p>{{ $sanPham->TenSanPham }}</p>
                        </div>
                        <div class="price">
                            <a>{{ number_format($sanPham->Gia, 0, ',', '.') }} VND</a>
                        </div>
                        <div class="promotion">
                            Khuyến mãi
                        </div>
                        <div class="quantity">
                            Số lượng: <p>{{ $sanPham->SoLuong }}</p>
                        </div>
                    </div>
                @empty
                    <p>Không có sản phẩm nào.</p>
                @endforelse
            </div>

            <div class="title">
                SẢN PHẨM MỚI
            </div>
            <div class="product-list">
                @forelse($newsanPhams as $sanPham)
                    <div class="product-item">
                        <img alt="Placeholder image of a product" height="200"
                            src="https://storage.googleapis.com/a1aa/image/co6APYIgHqJhGZIOkpzs2eXRlbEPZYOUIel8w1Lc5Agaxz1TA.jpg"
                            width="200" />
                        <div class="description">
                            <p>{{ $sanPham->TenSanPham }}</p>
                        </div>
                        <div class="price">
                            <a>{{ number_format($sanPham->Gia, 0, ',', '.') }} VND</a>
                        </div>
                        <div class="promotion">
                            Khuyến mãi
                        </div>
                        <div class="quantity">
                            Số lượng: <p>{{ $sanPham->SoLuong }}</p>
                        </div>
                    </div>
                @empty
                    <p>Không có sản phẩm nào.</p>
                @endforelse
            </div>







        </div>
    </body>

    </html>
@endsection
