@extends('layouts.app')
@section('title', 'Tìm Kiếm Sản Phẩm')
@section('content')

<link rel="stylesheet" href="{{ asset('css/TimKiemSanPham.css') }}">
<div class="container">
    <div class="search-section">
        <h2>Tìm Kiếm Sản Phẩm</h2>
        <div class="search-bar">
            <form action="{{ route('search.sanpham') }}" method="GET">
                <div class="form-group">
                    <label for="maSanPham">Mã Sản Phẩm:</label>
                    <input type="text" name="maSanPham" id="maSanPham" placeholder="Nhập mã sản phẩm" />
                </div>
                <div class="form-group">
                    <label for="tenSanPham">Tên Sản Phẩm:</label>
                    <input type="text" name="tenSanPham" id="tenSanPham" placeholder="Nhập tên sản phẩm" />
                </div>
                <div class="form-group">
                    <label for="danhMuc">Danh Mục:</label>
                    <input type="text" name="danhMuc" id="danhMuc" placeholder="Nhập danh mục" />
                </div>
                <div class="form-group">
                    <label for="giaTu">Giá Từ:</label>
                    <input type="number" name="giaTu" id="giaTu" placeholder="Nhập giá từ" />
                </div>
                <div class="form-group">
                    <label for="giaDen">Giá Đến:</label>
                    <input type="number" name="giaDen" id="giaDen" placeholder="Nhập giá đến" />
                </div>
                <button type="submit">Tìm kiếm</button>
                <button type="reset">Bộ lọc</button>
            </form>
        </div>
        @if($sanPhams->isEmpty())
            <p>Không tìm thấy sản phẩm nào.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Danh Mục</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sanPhams as $sanPham)
                        <tr>
                            <td>{{ $sanPham->MaSanPham }}</td>
                            <td>{{ $sanPham->TenSanPham }}</td>
                            <td>{{ $sanPham->DanhMuc }}</td>
                            <td>{{ $sanPham->Gia }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
