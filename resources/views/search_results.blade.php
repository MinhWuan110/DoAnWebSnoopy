@extends('layouts.User')

@section('title', 'Chi tiết sản phẩm')

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

    .product-detail {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 8px;
        background-color: white;
        width: 100%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
    }

    .product-detail:hover {
        transform: translateY(-5px);
    }

    .product-detail h2 {
        margin: 0 0 10px;
        font-size: 2em;
    }

    .product-detail p {
        margin: 5px 0;
        color: #555;
    }

    .product-detail img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        margin-bottom: 15px;
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
    @if ($products->count())
        @foreach ($products as $product)
            <div class="product-detail">
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
            </div>
        @endforeach

        <div class="pagination">
    {{ $products->appends(request()->input())->links('pagination::bootstrap-4') }}</div>

    @else
        <p>Không tìm thấy sản phẩm nào.</p>
    @endif
</div>
@endsection
