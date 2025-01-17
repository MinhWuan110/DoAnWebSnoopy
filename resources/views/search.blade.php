@extends('layouts.User')

@section('title', 'Tìm kiếm sản phẩm')

@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f8f8f8;
    }

    .search-container {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .search-title {
        margin-bottom: 20px;
        font-size: 2em;
        text-align: center;
        color: #333;
    }

    .search-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .filter-section {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .filter-item {
        flex: 1;
        min-width: 200px;
    }

    .price-section {
        display: flex;
        gap: 10px;
        width: 100%;
    }

    .form-input {
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
    }

    .button-group {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .btn {
        padding: 15px;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .btn-success {
        background-color: #28a745; /* Xanh lá cây */
    }

    .btn-success:hover {
        background-color: #218838; /* Xanh lá cây đậm hơn khi hover */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }

    .btn-secondary {
        background-color: #6c757d; /* Màu xám */
    }

    .btn-secondary:hover {
        background-color: #5a6268; /* Màu xám đậm hơn khi hover */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }
</style>

<div class="container search-container">
    <h1 class="search-title">Tìm kiếm Sản Phẩm</h1>

    <form action="{{ route('search') }}" method="GET" class="search-form">
        <div class="filter-section">
            <div class="filter-item">
                <input type="text" name="name" placeholder="Nhập tên sản phẩm" class="form-input">
            </div>
            <div class="filter-item">
                <select name="category" class="form-input">
                    <option value="">Chọn danh mục sản phẩm</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->MaDanhMuc }}">{{ $category->TenDanhMuc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="price-section">
                <div class="filter-item">
                    <input type="number" name="min_price" placeholder="Nhập giá tối thiểu" class="form-input">
                </div>
                <div class="filter-item">
                    <input type="number" name="max_price" placeholder="Nhập giá tối đa" class="form-input">
                </div>
            </div>
        </div>
        <div class="button-group">
            <button type="submit" class="btn btn-success">Tìm kiếm</button>
         
        </div>
    </form>
</div>
@endsection
