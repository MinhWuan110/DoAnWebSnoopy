<?php
// app/Models/SanPham.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    // Nếu tên bảng không phải là 'sanphams', bạn cần chỉ định bảng
    protected $table = 'sanpham';

    // Đảm bảo rằng bảng không có các trường timestamps (created_at, updated_at)
    public $timestamps = false;

    // Định nghĩa các trường cần thiết trong bảng
    protected $fillable = ['MaSanPham', 'TenSanPham']; // Các trường trong bảng sanpham
}
