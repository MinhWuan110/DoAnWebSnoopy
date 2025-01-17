<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
    <style>
        .product-detail {
            width: 80%;
            margin: 20px auto;
        }

        .product-detail h2 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .product-detail img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .product-detail p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

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
    <p>Mô tả: {{ $product->MoTa }}</p>
</div>

</body>
</html>
