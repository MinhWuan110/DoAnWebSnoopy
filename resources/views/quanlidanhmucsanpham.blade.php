@extends('layouts.admin')
@section('title', 'Quản Lý Danh Mục')
@section('content')

<link rel="stylesheet" href="{{ asset('css/QLSanPham.css') }}">
<div class="container">
    <div class="form-section">
        <h2>Quản Lý Danh Mục</h2>
        <form action="{{ route('store.danhmuc') }}" method="POST">
            @csrf
            <label for="MaDanhMuc">Mã Danh Mục</label>
            <input type="text" id="MaDanhMuc" name="MaDanhMuc" placeholder="Nhập mã danh mục" required />
            <label for="TenDanhMuc">Tên Danh Mục</label>
            <input type="text" id="TenDanhMuc" name="TenDanhMuc" placeholder="Nhập tên danh mục" required />
            <button type="submit">Thêm Danh Mục</button>
        </form>
    </div>

    <div class="search-section">
        <h2>Danh Sách Danh Mục</h2>
        <div class="search-bar">
            <form action="{{ route('search.danhmuc') }}" method="GET">
                <input type="text" name="query" placeholder="Tìm Kiếm Danh Mục" />
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        @if($danhMucSanPhams->isEmpty())
            <p>Không tìm thấy danh mục nào.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã Danh Mục</th>
                        <th>Tên Danh Mục</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhMucSanPhams as $danhMuc)
                        <tr>
                            <td>{{ $danhMuc->MaDanhMuc }}</td>
                            <td>{{ $danhMuc->TenDanhMuc }}</td>
                            <td>
                                <form action="{{ route('categories.destroy', $danhMuc->MaDanhMuc) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">Xóa</button>
                                </form>
                                <button class="btn btn-warning editButton" data-id="{{ $danhMuc->MaDanhMuc }}" data-name="{{ $danhMuc->TenDanhMuc }}">Sửa</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
<!-- Modal Chỉnh Sửa -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Chỉnh Sửa Danh Mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="editForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit-ma-danh-muc">Mã Danh Mục</label>
                        <input type="text" class="form-control" id="edit-ma-danh-muc" name="MaDanhMuc">
                    </div>
                    <div class="form-group">
                        <label for="edit-ten-danh-muc">Tên Danh Mục</label>
                        <input type="text" class="form-control" id="edit-ten-danh-muc" name="TenDanhMuc">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>

        </div>
    </div>
</div>

</div>

</script>

<script>
    document.querySelectorAll('.editButton').forEach(button => {
        button.onclick = function() {
            document.getElementById('edit-ma-danh-muc').value = this.dataset.id;
            document.getElementById('edit-ten-danh-muc').value = this.dataset.name;
            document.getElementById('editForm').action = "{{ url('/admin/quanlidanhmucsanpham') }}/" + this.dataset.id;
            $('#editModal').modal('show');
        };
    });
</script>

@endsection
