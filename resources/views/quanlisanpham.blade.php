@extends('layouts.admin')
@section('title', 'Quản Lý Sản Phẩm')
@section('content')
<div class="container">
    <div class="form-section">
        <h2>Quản Lý Sản Phẩm</h2>
        <form>
            <label for="product-name">Tên Sản Phẩm</label>
            <input type="text" id="product-name" placeholder="Nhập tên sản phẩm" />

            <label for="product-code">Mã Sản Phẩm</label>
            <input type="text" id="product-code" placeholder="Nhập mã sản phẩm" />

            <label for="product-price">Giá Sản Phẩm</label>
            <input type="number" id="product-price" placeholder="Nhập giá sản phẩm" />

            <label for="product-quantity">Mã Loại Sản Phẩm </label>
            <input type="number" id="product-codetype" placeholder="Nhập mã loại" />

            <label for="product-quantity">Số Lượng</label>
            <input type="number" id="product-quantity" placeholder="Nhập số lượng" />

            <label for="product-status">Trạng Thái</label>
            <select id="product-status">
                <option value="active">Còn Hàng</option>
                <option value="inactive">Hết Hàng</option>
            </select>

            <label for="product-image">Hình Ảnh</label>
            <input type="file" id="product-image" />

            <button type="submit">Thêm Sản Phẩm</button>
        </form>
    </div>

    <div class="search-section">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="search-bar">
            <input type="text" placeholder="Tìm Kiếm Sản Phẩm" />
            <button><i class="fas fa-search"></i></button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Mã Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>SP001</td>
                    <td>Điện Thoại XYZ</td>
                    <td>10.000.000</td>
                    <td>100</td>
                    <td><span class="status active">Còn Hàng</span></td>
                </tr>
                <tr>
                    <td>SP002</td>
                    <td>Máy Tính ABC</td>
                    <td>20.000.000</td>
                    <td>0</td>
                    <td><span class="status inactive">Hết Hàng</span></td>
                </tr>
                <!-- Thêm các sản phẩm khác ở đây -->
            </tbody>
        </table>
    </div>
</div>

@endsection