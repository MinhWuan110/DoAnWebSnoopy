@extends('layouts.admin')
@section('title', 'Quản Lý Sản Phẩm')
@section('content')
<!-- @if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif -->
<link rel="stylesheet" href="{{ asset('css/QLSanPham.css') }}">
<div class="container">
    <div class="form-section">
        <h2>Quản Lý Sản Phẩm</h2>
        <!-- Form thêm sản phẩm -->
        <form action="{{ route('store.sanpham') }}" method="POST">
            @csrf
            <label for="product-name">Tên Sản Phẩm</label>
            <input type="text" id="product-name" name="TenSanPham" placeholder="Nhập tên sản phẩm" required />
            <label for="ma-san-pham">Mã Sản Phẩm</label>
            <input type="text" id="ma-san-pham" name="MaSanPham" placeholder="Nhập Mã Sản Phẩm" required />
            <label for="product-price">Giá Sản Phẩm</label>
            <input type="number" id="product-price" name="Gia" placeholder="Nhập giá sản phẩm" required />
            <label for="ma-loai-san-pham">Mã Loại Sản Phẩm</label>
            <select id="ma-loai-san-pham" name="MaLoaiSP" required>
                <option value="">Chọn Mã Loại Sản Phẩm</option>
                @foreach($loaiSanPhams as $loaiSanPham)
                <option value="{{ $loaiSanPham->MaLoaiSP }}">{{ $loaiSanPham->MaLoaiSP }} - {{ $loaiSanPham->TenLoaiSanPham }}</option>
                @endforeach
            </select>
            <label for="product-quantity">Số Lượng</label>
            <input type="number" id="product-quantity" name="SoLuong" placeholder="Nhập số lượng" required />
            <label for="ma-nha-cung-cap">Mã Nhà Cung Cấp</label>
            <select id="ma-nha-cung-cap" name="MaNhaCungCap" required>
                <option value="">Chọn Nhà Cung Cấp</option>
                @foreach($nhaCungCaps as $nhaCungCap)
                <option value="{{ $nhaCungCap->MaNhaCungCap }}">{{ $nhaCungCap->MaNhaCungCap }} - {{ $nhaCungCap->TenNhaCungCap }}</option>
                @endforeach
            </select>
            <label for="product-status">Trạng Thái</label>
            <select id="product-status" name="TrangThai" required>
                <option value="1">Còn Hàng</option>
                <option value="0">Hết Hàng</option>
            </select>
            <button type="submit">Thêm Sản Phẩm</button>
        </form>
    </div>

    <div class="search-section">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="search-bar">
            <form action="{{ route('search.sanpham') }}" method="GET">
                <input type="text" name="query" placeholder="Tìm Kiếm Sản Phẩm" />
                <button type="submit"><i class="fas fa-search"></i></button>
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
                    <th>Giá Sản Phẩm</th>
                    <th>Mã Loại Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Mã Nhà Cung cấp</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sanPhams as $sanPham)
                <tr>
                    <td>{{ $sanPham->MaSanPham }}</td>
                    <td>{{ $sanPham->TenSanPham }}</td>
                    <td>{{ $sanPham->Gia }}</td>
                    <td>{{ $sanPham->MaLoaiSP }}</td>
                    <td>{{ $sanPham->SoLuong }}</td>
                    <td>{{ $sanPham->MaNhaCungCap }}</td>
                    <td>{{ $sanPham->TrangThai == 1 ? 'Còn Hàng' : 'Hết Hàng' }}</td>
                    <td>
                        <button class="btn btn-warning editButton"
                            data-id="{{ $sanPham->MaSanPham }}"
                            data-name="{{ $sanPham->TenSanPham }}"
                            data-price="{{ $sanPham->Gia }}"
                            data-quantity="{{ $sanPham->SoLuong }}"
                            data-ma-loai="{{ $sanPham->MaLoaiSP }}"
                            data-ma-nha-cung-cap="{{ $sanPham->MaNhaCungCap }}"
                            data-trang-thai="{{ $sanPham->TrangThai }}">
                            Sửa
                        </button>
                        <br>
                        <br>
                        <form action="{{ route('destroy.sanpham', $sanPham->MaSanPham) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</button>
                        </form>
                    </td>
                    <td><a href="" class="btn btn-primary">Xem chi tiết</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Chỉnh Sửa Sản Phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" id="edit-ma-san-pham" name="MaSanPham" />

                        <div class="form-group">
                            <label for="edit-product-name">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" id="edit-product-name" name="TenSanPham" required />
                        </div>

                        <div class="form-group">
                            <label for="edit-product-price">Giá Sản Phẩm</label>
                            <input type="number" class="form-control" id="edit-product-price" name="Gia" required />
                        </div>

                        <div class="form-group">
                            <label for="edit-product-quantity">Số Lượng</label>
                            <input type="number" class="form-control" id="edit-product-quantity" name="SoLuong" required />
                        </div>

                        <div class="form-group">
                            <label for="edit-ma-loai-san-pham">Mã Loại Sản Phẩm</label>
                            <select class="form-control" id="edit-ma-loai-san-pham" name="MaLoaiSP" required>
                                <option value="">Chọn Mã Loại Sản Phẩm</option>
                                @foreach($loaiSanPhams as $loaiSanPham)
                                <option value="{{ $loaiSanPham->MaLoaiSP }}">{{ $loaiSanPham->MaLoaiSP }}-{{ $loaiSanPham->TenLoaiSanPham }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="edit-ma-nha-cung-cap">Mã Nhà Cung Cấp</label>
                            <select class="form-control" id="edit-ma-nha-cung-cap" name="MaNhaCungCap" required>
                                <option value="">Chọn Mã Nhà Cung Cấp</option>
                                @foreach($nhaCungCaps as $nhaCungCap)
                                <option value="{{ $nhaCungCap->MaNhaCungCap }}">{{ $nhaCungCap->MaNhaCungCap}}-{{ $nhaCungCap->TenNhaCungCap }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="edit-trang-thai">Trạng Thái</label>
                            <select class="form-control" id="edit-trang-thai" name="TrangThai" required>
                                <option value="1">Còn Hàng</option>
                                <option value="0">Hết Hàng</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.editButton').forEach(button => {
        button.onclick = function() {
            document.getElementById('edit-ma-san-pham').value = this.dataset.id;
            document.getElementById('edit-product-name').value = this.dataset.name;
            document.getElementById('edit-product-price').value = this.dataset.price;
            document.getElementById('edit-product-quantity').value = this.dataset.quantity;
            document.getElementById('edit-ma-loai-san-pham').value = this.dataset.maLoai;
            document.getElementById('edit-ma-nha-cung-cap').value = this.dataset.maNhaCungCap;
            document.getElementById('edit-trang-thai').value = this.dataset.trangThai;

            // Cập nhật action của form
            document.getElementById('editForm').action = "{{ url('/admin/quanlisanpham') }}/" + this.dataset.id;

            // Hiện modal
            $('#editModal').modal('show');
        };
    });
</script>

@endsection