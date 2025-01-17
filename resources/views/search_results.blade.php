<!DOCTYPE html>
<html>
<head>
    <title>Kết quả tìm kiếm</title>
    <style>
        .product-list {
            list-style-type: none;
            padding: 0;
            width: 80%;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-item {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            width: calc(33.333% - 20px);
            box-sizing: border-box;
        }

        .product-item h2 {
            margin: 0;
            font-size: 1.2em;
        }

        .product-item p {
            margin: 5px 0;
        }

        .product-item img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }

        .product-item a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .product-item a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

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
            <a href="{{ route('product.detail', ['id' => $product->MaSanPham]) }}">Xem chi tiết</a>
        </li>
    @endforeach
</ul>

</body>
</html>
