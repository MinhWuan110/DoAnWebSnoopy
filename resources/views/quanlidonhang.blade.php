@extends('layouts.admin')
@section('title', 'Quản Lý Đơn Hàng')
@section('content')

<div class="container mt-4">
    <div class="search-section bg-light p-4 rounded shadow-sm">
        <h2 class="mb-3">Quản Lý Đơn Hàng</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('quanlidonhang.search') }}" method="GET" class="d-flex mb-3">
            <input type="text" name="query" class="form-control me-2" placeholder="Nhập mã đơn hàng">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            <a href="{{ route('quanlidonhang') }}" class="btn btn-success ms-2">Hiển thị tất cả</a>
            <button type="button" class="btn btn-secondary ms-2"><i class="fas fa-filter"></i></button>
        </form>
    </div>

    @if($orders->isEmpty())
        <div class="alert alert-warning mt-3">Không tìm thấy đơn hàng nào.</div>
    @else
        <div class="table-responsive mt-3">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Mã Khách Hàng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Ngày Giao Hàng Dự Kiến</th>
                        <th>Ngày Giao Hàng Thực Tế</th>
                        <th>Trạng Thái Đơn Hàng</th>
                        <th>Tổng Tiền</th>
                        <th>Phương Thức Vận Chuyển</th>
                        <th>Ghi Chú</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->MaDonHang }}</td>
                            <td>{{ $order->MaKhachHang }}</td>
                            <td>{{ $order->NgayDatHang }}</td>
                            <td>{{ $order->NgayGiaoHangDuKien }}</td>
                            <td>{{ $order->NgayGiaoHangThucTe }}</td>
                            <td>{{ $order->TrangThaiDonHang }}</td>
                            <td>{{ $order->TongTien }}</td>
                            <td>{{ $order->Ma_PTVanChuyen }}</td>
                            <td>{{ $order->GhiChu }}</td>
                            <td>
                                <button class="btn btn-warning editButton"
                                    data-id="{{ $order->MaDonHang }}"
                                    data-khachhang="{{ $order->MaKhachHang }}"
                                    data-ngaydat="{{ $order->NgayDatHang }}"
                                    data-ngaydukien="{{ $order->NgayGiaoHangDuKien }}"
                                    data-ngaythucte="{{ $order->NgayGiaoHangThucTe }}"
                                    data-trangthai="{{ $order->TrangThaiDonHang }}"
                                    data-tongtien="{{ $order->TongTien }}"
                                    data-vanchuyen="{{ $order->Ma_PTVanChuyen }}"
                                    data-ghichu="{{ $order->GhiChu }}">
                                    Cập nhật
                                </button>
                                <form action="{{ route('quanlidonhang.destroy', $order->MaDonHang) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Modal Chỉnh Sửa -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Chỉnh Sửa Đơn Hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="MaDonHang" class="form-label">Mã Đơn Hàng</label>
                        <input type="text" class="form-control" id="MaDonHang" name="MaDonHang" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="MaKhachHang" class="form-label">Mã Khách Hàng</label>
                        <input type="text" class="form-control" id="MaKhachHang" name="MaKhachHang">
                    </div>
                    <div class="mb-3">
                        <label for="NgayDatHang" class="form-label">Ngày Đặt Hàng</label>
                        <input type="datetime-local" class="form-control" id="NgayDatHang" name="NgayDatHang">
                    </div>
                    <div class="mb-3">
                        <label for="NgayGiaoHangDuKien" class="form-label">Ngày Giao Hàng Dự Kiến</label>
                        <input type="date" class="form-control" id="NgayGiaoHangDuKien" name="NgayGiaoHangDuKien">
                    </div>
                    <div class="mb-3">
                        <label for="NgayGiaoHangThucTe" class="form-label">Ngày Giao Hàng Thực Tế</label>
                        <input type="date" class="form-control" id="NgayGiaoHangThucTe" name="NgayGiaoHangThucTe">
                    </div>
                    <div class="mb-3">
                        <label for="TrangThaiDonHang" class="form-label">Trạng Thái Đơn Hàng</label>
                        <input type="text" class="form-control" id="TrangThaiDonHang" name="TrangThaiDonHang">
                    </div>
                    <div class="mb-3">
                        <label for="TongTien" class="form-label">Tổng Tiền</label>
                        <input type="number" class="form-control" id="TongTien" name="TongTien">
                    </div>
                    <div class="mb-3">
                        <label for="Ma_PTVanChuyen" class="form-label">Phương Thức Vận Chuyển</label>
                        <input type="text" class="form-control" id="Ma_PTVanChuyen" name="Ma_PTVanChuyen">
                    </div>
                    <div class="mb-3">
                        <label for="GhiChu" class="form-label">Ghi Chú</label>
                        <textarea class="form-control" id="GhiChu" name="GhiChu"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.querySelectorAll('.editButton').forEach(button => {
    button.onclick = function() {
        document.getElementById('MaDonHang').value = this.dataset.id;
        document.getElementById('MaKhachHang').value = this.dataset.khachhang;
        document.getElementById('NgayDatHang').value = this.dataset.ngaydat;
        document.getElementById('NgayGiaoHangDuKien').value = this.dataset.ngaydukien;
        document.getElementById('NgayGiaoHangThucTe').value = this.dataset.ngaythucte;
        document.getElementById('TrangThaiDonHang').value = this.dataset.trangthai;
        document.getElementById('TongTien').value = this.dataset.tongtien;
        document.getElementById('Ma_PTVanChuyen').value = this.dataset.vanchuyen;
        document.getElementById('GhiChu').value = this.dataset.ghichu;
        document.getElementById('editForm').action = "{{ url('/admin/quanlidonhang') }}/" + this.dataset.id;
        $('#editModal').modal('show');
    };
});

</script>

@endsection
