@extends('layouts.admin')

@section('title', 'Quản Lý Liên Hệ')

@section('content')
<link rel="stylesheet" href="{{ asset('css/QLLienHe.css') }}">
<div class="container">
    <div class="search-section">
        <h2>Tìm Kiếm Liên Hệ</h2>
        <form class="search-form">
            <label for="customer-id">Tìm Kiếm Liên Hệ Qua Họ Tên </label>
            <input type="text" id="customer-id" placeholder="Nhập mã khách hàng" />

            <label for="email">Tìm Kiếm Liên Hệ Qua Email</label>
            <input type="email" id="email" placeholder="Nhập email" />

            <label for="phone">Tìm Kiếm Liên Hệ Qua Số Điện Thoại</label>
            <input type="tel" id="phone" placeholder="Nhập số điện thoại" />


            <button type="button" class="filter-button">Hiển Thị Tất Cả</button>
        </form>
    </div>

    <div class="contact-section">
        <h2>Danh Sách Liên Hệ</h2>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Họ và tên </th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Nội dung</th>
                    <th>Ngày Gửi</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lienhes as $lienhe)
                <tr>
                    <td>{{ $lienhe->id }}</td>
                    <td>{{ $lienhe->hoVaTen }}</td>
                    <td>{{ $lienhe->email }}</td>
                    <td>{{ $lienhe->sdt }}</td>
                    <td>{{ $lienhe->noiDung }}</td>
                    <td>{{ $lienhe->thoiGian }}</td>
                    <td>
                        <button class="btn btn-warning editButton"
                            data-id="{{ $lienhe->id}}"
                            data-hoVaTen="{{ $lienhe->hoVaTen}}"
                            data-email="{{ $lienhe->email}}"
                            data-sdt="{{ $lienhe->sdt}}"
                            data-noiDung="{{ $lienhe->noiDung}}">
                            Sửa
                        </button>
                        <br>
                        <br>
                        <button class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Chỉnh Sửa Liên Hệ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" id="edit-id" name="id" />

                        <div class="form-group">
                            <label for="edit-ho-ten">Họ và Tên</label>
                            <input type="text" class="form-control" id="edit-ho-ten" name="hoVaTen" required />
                        </div>

                        <div class="form-group">
                            <label for="edit-email">Email</label>
                            <input type="email" class="form-control" id="edit-email" name="email" required />
                        </div>

                        <div class="form-group">
                            <label for="edit-sdt">Số Điện Thoại</label>
                            <input type="text" class="form-control" id="edit-sdt" name="sdt" required />
                        </div>

                        <div class="form-group">
                            <label for="edit-noi-dung">Nội Dung</label>
                            <textarea class="form-control" id="edit-noi-dung" name="noiDung" required></textarea>
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
            document.getElementById('edit-id').value = this.dataset.id;
            document.getElementById('edit-ho-ten').value = this.dataset.hoVaTen;
            document.getElementById('edit-email').value = this.dataset.email;
            document.getElementById('edit-sdt').value = this.dataset.sdt;
            document.getElementById('edit-noi-dung').value = this.dataset.noiDung;

            // Cập nhật action của form
            document.getElementById('editForm').action = "{{ url('/admin/quanlilienhe') }}/" + this.dataset.id;

            // Hiện modal
            $('#editModal').modal('show');
        };
    });
</script>

@endsection