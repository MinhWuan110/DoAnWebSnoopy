@extends('layouts.admin')
@section('title', 'Quản Lý Sản Phẩm')
@section('content')
<div class="container">
    <div class="form-section">
        <h2>Quản Lý Danh Mục Sản Phẩm</h2>
        <form>
           
            <label for="product-code">Mã Danh Mục</label>
            <input type="text" id="product-code" placeholder="Nhập mã danh mục" />
            <label for="product-name">Tên Danh Mục</label>
            <input type="text" id="product-name" placeholder="Nhập tên danh mục" />
            <label for="product-name">Nội dung</label>
            <input type="text" id="product-name" placeholder="Nhập nội dung" />
            <label for="product-status">Trạng Thái</label>
            <select id="product-status">
                <option value="active">Còn Hàng</option>
                <option value="inactive">Hết Hàng</option>
            </select>

            <label for="product-image">Hình Ảnh</label>
            <input type="file" id="product-image" />

            <button type="submit">Thêm Danh Mục</button>
        </form>
    </div>

    <div class="search-section">
        <h2>Danh Sách Danh Mục</h2>
        <div class="search-bar">
            <input type="text" placeholder="Tìm Kiếm Danh Mục" />
            <button><i class="fas fa-search"></i></button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Mã Danh Mục</th>
                    <th>Tên Danh Mục</th>
                    <th>Trạng Thái </th>
                    <th>Nội dung</th>
                
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>DM001</td>
                    <td>Điện tử</td>
                    <td><span class="status active">Còn Hàng</span></td>
                    <td>Xuất khẩu</td>
                </tr>
                <tr>
                    <td>DM002</td>
                    <td>Gia dụng</td>
                    <td><span class="status inactive">Hết Hàng</span></td>
                    <td>Trống</td>
                    
                </tr>
                <!-- Thêm các sản phẩm khác ở đây -->
            </tbody>
        </table>
    </div>
</div>

@endsection