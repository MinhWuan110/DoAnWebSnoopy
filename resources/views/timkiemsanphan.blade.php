@extends('layouts.Homepage')
@section('title', 'Tìm Kiếm Sản Phẩm')
@section('content')
<div class="container mt-5" style="background-color: #f0f0f0; padding: 30px; border-radius: 8px;">
    <h1 class="text-center">Tìm kiếm Sản Phẩm</h1>
    
    <div class="form-group">
        <div class="d-flex mb-3">
            <input type="text" class="form-control mr-2" placeholder="Nhập mã đơn hàng">
            <button class="btn btn-success" style="background-color: #28a745; color: white;">Tìm kiếm</button>
            <button class="btn btn-light ml-2" style="border: 1px solid #ccc;">
                <i class="fa fa-filter"></i> Bộ lọc
            </button>
            <input type="text" class="form-control mr-2" placeholder="Nhập tên sản phẩm theo mã sản phẩm">
            <button class="btn btn-success" style="background-color: #28a745; color: white;">Tìm kiếm</button>
            <button class="btn btn-light ml-2" style="border: 1px solid #ccc;">
                <i class="fa fa-filter"></i> Bộ lọc
            </button>
            <input type="text" class="form-control mr-2" placeholder="Nhập tên đơn hàng">
            <button class="btn btn-success" style="background-color: #28a745; color: white;">Tìm kiếm</button>
            <button class="btn btn-light ml-2" style="border: 1px solid #ccc;">
                <i class="fa fa-filter"></i> Bộ lọc
            </button>
            <input type="text" class="form-control mr-2" placeholder="Nhập giá sản phẩm">
            
            <button class="btn btn-success" style="background-color: #28a745; color: white;">Tìm kiếm</button>
            <button class="btn btn-light ml-2" style="border: 1px solid #ccc;">
                <i class="fa fa-filter"></i> Bộ lọc
            </button>
        </div>
    </div>

    <h2 class="mt-4">Sản phẩm hàng đầu</h2>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="path/to/iphone12.jpg" class="card-img-top" alt="Iphone 12">
                <div class="card-body">
                    <h5 class="card-title">Iphone 12</h5>
                    <p class="card-text">12,000,000 VNĐ</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="path/to/samsung-galaxy.jpg" class="card-img-top" alt="Samsung Galaxy">
                <div class="card-body">
                    <h5 class="card-title">Samsung Galaxy</h5>
                    <p class="card-text">12,000,000 VNĐ</p>
                </div>
            </div>
        </div>
        {{-- Thêm sản phẩm khác tại đây --}}
    </div>
</div>
@endsection