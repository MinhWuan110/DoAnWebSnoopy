<!DOCTYPE html>
<html>
<head>
    <title>Tìm kiếm sản phẩm</title>
    <style>
        .search-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 300px;
            margin: 20px auto;
        }

        .search-form input, .search-form button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .search-form button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form action="{{ route('search') }}" method="GET" class="search-form">
    <input type="text" name="name" placeholder="Tên sản phẩm">
    <input type="text" name="description" placeholder="Mô tả sản phẩm">
    <input type="text" name="category" placeholder="Danh mục sản phẩm">
    <input type="number" name="min_price" placeholder="Giá tối thiểu">
    <input type="number" name="max_price" placeholder="Giá tối đa">
    <button type="submit">Tìm kiếm</button>
</form>

</body>
</html>
