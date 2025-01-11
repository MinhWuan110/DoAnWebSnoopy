<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem đã đăng nhập chưa
        if (!session()->has('user')) {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('login.form')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }

        // Lấy thông tin người dùng từ session
        $user = session('user');

        // Kiểm tra quyền hạn của người dùng
        if ($user->QuyenHan == 1 && $request->is('admin/*')) {
            // Nếu quyền hạn là 1, không cho phép truy cập vào các trang admin
            return redirect()->route('login.form')->with('error', 'Bạn không có quyền truy cập vào trang này.');
        }

        return $next($request);
    }
}