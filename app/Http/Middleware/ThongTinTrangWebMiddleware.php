<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ThongTinTrangWeb;

class ThongTinTrangWebMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Lấy dữ liệu từ bảng thongtintrangweb
        $thongTin = ThongTinTrangWeb::first();

        // Truyền dữ liệu vào tất cả view
        view()->share('thongTin', $thongTin);

        return $next($request);
    }
}
