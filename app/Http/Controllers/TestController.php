<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        try {
            DB::connection()->getPdo();
            return "Kết nối thành công!";
        } catch (\Exception $e) {
            return "Kết nối thất bại: " . $e->getMessage();
        }
    }
}