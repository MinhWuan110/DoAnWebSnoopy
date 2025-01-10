<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanphamnoibat extends Model
{
    use HasFactory;

    protected $table = 'sanphamnoibat'; // Tên bảng
    protected $primaryKey = 'masanpham'; // Đặt nếu primary key không phải là `id`
    protected $fillable = ['masanpham']; // Các cột có thể gán
}
