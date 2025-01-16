<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongKeDoanhThu extends Model
{
    use HasFactory;

    protected $table = 'thongkedoanhthu';
    protected $fillable = [
        'MaSanPham',
        'TenSanPham',
        'TongSoLuongMua',
        'TongDoanhThu',
        'Thang',
        'Nam',
    ];
}
