@extends('layouts.User') 
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<link rel="stylesheet" href="{{ asset('css/lienhe.css') }}">
<div class="container">
    <h2 class="text-center">Gửi Thông Tin Liên Hệ Đến Với Chúng Tôi</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('lienhe.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="customerName">Tên khách hàng</label>
                            <input type="text" class="form-control" id="customerName" name="HoVaTen" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="sdt" required>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Nội dung </label>
                            <input type="text" class="form-control" id="quantity" name="noiDung" required>
                        </div>


                        <button type="submit" class="btn btn-success btn-block" class="btn btn-primary">Gửi thông tin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection