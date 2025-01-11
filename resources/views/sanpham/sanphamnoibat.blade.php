@extends('layouts.admin')

@section('title', 'Quản lý Sản phẩm Nổi bật')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/sanphamnoibat.css') }}">
    <h1>Quản lý Sản phẩm Nổi bật</h1>
    <div class="layout">

        <div class="sanpham ">
            <h2>Danh Sách Sản Phẩm </h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Trạng Thái</th>
                        <th>Hành Động</th>
                        <th>Chi Tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sanPhamss as $sanPham)
                        <tr>
                            <div class="san-pham">
                                <td>{{ $sanPham->MaSanPham }}</td>
                                <td>{{ $sanPham->TenSanPham }}</td>
                                <td>{{ number_format($sanPham->Gia, 0, ',', '.') }} VNĐ</td>
                                <td>{{ $sanPham->SoLuong }}</td>
                                <td>{{ $sanPham->TrangThai == 1 ? 'Còn Hàng' : 'Hết Hàng' }}</td>
                                <td>
                                    <!-- Nút thêm nổi bật -->
                                    <form action="{{ route('sanphamnoibat.store') }}" method="POST" class="them-noi-bat-form">
                                        @csrf
                                        <input type="hidden" name="masanpham" value="{{ $sanPham->MaSanPham }}">
                                        <button type="submit" class="btn btn-primary">Thêm nổi bật</button>
                                    </form>
                                </td>
                                <td><a href="" class="btn btn-primary">Xem chi tiết</a></td>
                        </tr>
        </div>
        @endforeach


        </tbody>
        </table>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
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
                                <input type="text" class="form-control" id="edit-product-name" name="TenSanPham"
                                    required />
                            </div>

                            <div class="form-group">
                                <label for="edit-product-price">Giá Sản Phẩm</label>
                                <input type="number" class="form-control" id="edit-product-price" name="Gia"
                                    required />
                            </div>

                            <div class="form-group">
                                <label for="edit-product-quantity">Số Lượng</label>
                                <input type="number" class="form-control" id="edit-product-quantity" name="SoLuong"
                                    required />
                            </div>

                            {{-- <div class="form-group">
                                    <label for="edit-ma-loai-san-pham">Mã Loại Sản Phẩm</label>
                                    <select class="form-control" id="edit-ma-loai-san-pham" name="MaLoaiSP" required>
                                        <option value="">Chọn Mã Loại Sản Phẩm</option>
                                        @foreach ($loaiSanPhams as $loaiSanPham)
                                            <option value="{{ $loaiSanPham->MaLoaiSP }}">
                                                {{ $loaiSanPham->MaLoaiSP }}-{{ $loaiSanPham->TenLoaiSanPham }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div> --}}

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


    <div class="sanphamnoibat ">
        <h2>Danh Sách Sản Phảm Nổi Bật </h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sanPhamNoiBat as $sanPham)
                    <tr>
                        <td>{{ $sanPham->MaSanPham }}</td>
                        <td>{{ $sanPham->TenSanPham }}</td>
                        <td>{{ number_format($sanPham->Gia, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $sanPham->SoLuong }}</td>
                        <td>{{ $sanPham->TrangThai == 1 ? 'Còn Hàng' : 'Hết Hàng' }}</td>
                        <td>
                            <!-- Nút xóa sản phẩm nổi bật -->
                            {{-- <form action="{{ route('sanphamnoibat.destroy', $sanPham->MaSanPham) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning">Xóa Nổi Bật</button>
                            </form> --}}
                        </td>
                        <td><a href="" class="btn btn-primary">Xem chi tiết</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
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
                                <input type="text" class="form-control" id="edit-product-name" name="TenSanPham"
                                    required />
                            </div>

                            <div class="form-group">
                                <label for="edit-product-price">Giá Sản Phẩm</label>
                                <input type="number" class="form-control" id="edit-product-price" name="Gia"
                                    required />
                            </div>

                            <div class="form-group">
                                <label for="edit-product-quantity">Số Lượng</label>
                                <input type="number" class="form-control" id="edit-product-quantity" name="SoLuong"
                                    required />
                            </div>

                            {{-- <div class="form-group">
                                    <label for="edit-ma-loai-san-pham">Mã Loại Sản Phẩm</label>
                                    <select class="form-control" id="edit-ma-loai-san-pham" name="MaLoaiSP" required>
                                        <option value="">Chọn Mã Loại Sản Phẩm</option>
                                        @foreach ($loaiSanPhams as $loaiSanPham)
                                            <option value="{{ $loaiSanPham->MaLoaiSP }}">
                                                {{ $loaiSanPham->MaLoaiSP }}-{{ $loaiSanPham->TenLoaiSanPham }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div> --}}

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

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    </div>
@endsection
