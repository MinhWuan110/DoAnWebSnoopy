@extends('layouts.admin')
@section('title', 'Quản Lý Đơn Hàng')
@section('content')

<link rel="stylesheet" href="{{ asset('css/QLDonHang.css') }}">
<div class="container">
    <div class="search-section">
        <h2>Quản Lí Đơn Hàng</h2>
        <div class="search-bar">
            <form action="{{ route('search.donhang') }}" method="GET">
                <input type="text" name="query" placeholder="Nhập mã đơn hàng" />
                <button type="submit"><i class="fas fa-search"></i></button>
                <button id="showAllButton">Hiển Thị Tất Cả</button>
            </form>
        </div>
        @if($donHangs->isEmpty())
            <p>Không tìm thấy đơn hàng nào.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Mã Khách Hàng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Ngày Giao Hàng Dự Kiến</th>
                        <th>Ngày Giao Hàng Thực Tế</th>
                        <th>Trạng Thái Đơn Hàng</th>
                        <th>Tổng Tiền</th>
                        <th>Mã PTVanChuyen</th>
                        <th>Ghi Chú</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donHangs as $donHang)
                        <tr>
                            <td>{{ $donHang->MaDonHang }}</td>
                            <td>{{ $donHang->MaKhachHang }}</td>
                            <td>{{ $donHang->NgayDatHang }}</td>
                            <td>{{ $donHang->NgayGiaoHangDuKien }}</td>
                            <td>{{ $donHang->NgayGiaoHangThucTe }}</td>
                            <td>{{ $donHang->TrangThaiDonHang }}</td>
                            <td>{{ $donHang->TongTien }}</td>
                            <td>{{ $donHang->Ma_PTVanChuyen }}</td>
                            <td>{{ $donHang->GhiChu }}</td>
                            <td>
                                <button class="btn btn-warning action-button updateButton" 
                                        data-id="{{ $donHang->MaDonHang }}" 
                                        data-makh="{{ $donHang->MaKhachHang }}" 
                                        data-ngaydat="{{ $donHang->NgayDatHang }}" 
                                        data-ngaydukien="{{ $donHang->NgayGiaoHangDuKien }}" 
                                        data-ngaythucte="{{ $donHang->NgayGiaoHangThucTe }}" 
                                        data-trangthai="{{ $donHang->TrangThaiDonHang }}" 
                                        data-tongtien="{{ $donHang->TongTien }}" 
                                        data-ptvanchuyen="{{ $donHang->Ma_PTVanChuyen }}" 
                                        data-ghichu="{{ $donHang->GhiChu }}">Cập Nhật</button>
                                <form action="{{ route('destroy.donhang', $donHang->MaDonHang) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger action-button" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <button id="backButton" onclick="window.location.href='{{ route('quanlidonhang') }}'">Quay Lại</button>
    </div>
</div>

<!-- Modal Chỉnh Sửa -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="updateModalLabel">Cập Nhật Đơn Hàng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="updateForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="updateMaDonHang">Mã Đơn Hàng</label>
                        <input type="text" class="form-control" id="updateMaDonHang" name="MaDonHang">
                    </div>
                    <div class="form-group">
                        <label for="updateMaKhachHang">Mã Khách Hàng</label>
                        <input type="text" class="form-control" id="updateMaKhachHang" name="MaKhachHang">
                    </div>
                    <div class="form-group">
                        <label for="updateNgayDatHang">Ngày Đặt Hàng</label>
                        <input type="datetime-local" class="form-control" id="updateNgayDatHang" name="NgayDatHang">
                    </div>
                    <div class="form-group">
                        <label for="updateNgayGiaoHangDuKien">Ngày Giao Hàng Dự Kiến</label>
                        <input type="date" class="form-control" id="updateNgayGiaoHangDuKien" name="NgayGiaoHangDuKien">
                    </div>
                    <div class="form-group">
                        <label for="updateNgayGiaoHangThucTe">Ngày Giao Hàng Thực Tế</label>
                        <input type="date" class="form-control" id="updateNgayGiaoHangThucTe" name="NgayGiaoHangThucTe">
                    </div>
                    <div class="form-group">
                        <label for="updateTrangThaiDonHang">Trạng Thái Đơn Hàng</label>
                        <input type="text" class="form-control" id="updateTrangThaiDonHang" name="TrangThaiDonHang">
                    </div>
                    <div class="form-group">
                        <label for="updateTongTien">Tổng Tiền</label>
                        <input type="number" class="form-control" id="updateTongTien" name="TongTien">
                    </div>
                    <div class="form-group">
                        <label for="updateMaPTVanChuyen">Mã Phương Thức Vận Chuyển</label>
                        <input type="text" class="form-control" id="updateMaPTVanChuyen" name="Ma_PTVanChuyen">
                    </div>
                    <div class="form-group">
                        <label for="updateGhiChu">Ghi Chú</label>
                        <textarea class="form-control" id="updateGhiChu" name="GhiChu"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>

        </div>
    </div>
</div>

<script>
    document.getElementById('showAllButton').onclick = function() {
        window.location.href = "{{ route('quanlidonhang') }}";
    };

    document.querySelectorAll('.updateButton').forEach(button => {
        button.onclick = function() {
            document.getElementById('updateMaDonHang').value = this.dataset.id;
            document.getElementById('updateMaKhachHang').value = this.dataset.makh;
            document.getElementById('updateNgayDatHang').value = this.dataset.ngaydat;
            document.getElementById('updateNgayGiaoHangDuKien').value = this.dataset.ngaydukien;
            document.getElementById('updateNgayGiaoHangThucTe').value = this.dataset.ngaythucte;
            document.getElementById('updateTrangThaiDonHang').value = this.dataset.trangthai;
            document.getElementById('updateTongTien').value = this.dataset.tongtien;
            document.getElementById('updateMaPTVanChuyen').value = this.dataset.ptvanchuyen;
            document.getElementById('updateGhiChu').value = this.dataset.ghichu;
            document.getElementById('updateForm').action = "{{ url('/admin/quanlidonhang') }}/" + this.dataset.id;
            $('#updateModal').modal('show');
        };
    });
</script>

@endsection
