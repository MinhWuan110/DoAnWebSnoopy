<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnhSanPham extends Model
{
    use HasFactory;
    protected $table = 'hinhanhsanpham';   
    protected $primaryKey = 'MaHinhAnh'; 
    public $incrementing = false;
}
