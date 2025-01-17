@extends('layouts.User')

@section('title', 'Kết quả tìm kiếm')

@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f8f8f8;
    }

    .container {
        padding: 20px;
    }

    .product-list {
        list-style-type: none;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .product-item {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 8px;
        background-color: white;
        width: calc(33.333% - 20px);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
    }

    .product-item:hover {
        transform: translateY(-5px);
    }

    .product-item h2 {
        margin: 0 0 10px;
        font-size: 1.5em;
    }

    .product-item p {
        margin: 5px 0;
        color: #555;
    }

    .product-item img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .product-item .actions a {
        display: inline-block;
        padding: 10px 15px;
        background-color: #007BFF;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.2s ease-in-out;
    }

    .product-item .actions a:hover {
        background-color: #0056b3;
    }

    .pagination {
        display: flex;
        justify-content: center;
        list-style-type: none;
        padding: 0;
        margin: 20px 0 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a {
        display: inline-block;
        padding: 10px 15px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-decoration: none;
        color: #555;
        transition: background-color 0.3s ease-in-out;
    }

    .pagination li a:hover {
        background-color: #f0f0f0;
    }
</style>

<div class="container">
    <h1>Kết quả tìm kiếm</h1>

    <ul class="product-list">
        @foreach ($products as $product)
            <li class="product-item">
                <h2>{{ $product->TenSanPham }}</h2>
                <p>Mã sản phẩm: {{ $product->MaSanPham }}</p>
                <p>Giá: {{ $product->Gia }} VND</p>
                <p>Danh mục: {{ $product->MaLoaiSP }}</p>
                <p>Số lượng: {{ $product->SoLuong }}</p>
                <p>Mã nhà cung cấp: {{ $product->MaNhaCungCap }}</p>
                <p>Tình trạng: {{ $product->TrangThai == 1 ? 'Còn hàng' : 'Hết hàng' }}</p>
                <p>Số sản phẩm đã bán: {{ $product->SPdaban }}</p>
                @if($product->DuongDanHinhAnh)
                    <img src="{{ $product->DuongDanHinhAnh }}" alt="Hình ảnh sản phẩm">
                @else
                    <p>Không có hình ảnh</p>
                @endif
                <div class="actions">
                    <a href="{{ route('product.detail', ['id' => $product->MaSanPham]) }}">Xem chi tiết</a>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="pagination">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
