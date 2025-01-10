<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'DanhMucSanPham'; // Xác định tên bảng cần tương tác
    protected $fillable = ['TenDanhMuc', 'MaDanhMuc']; // Các trường có thể được gán
}