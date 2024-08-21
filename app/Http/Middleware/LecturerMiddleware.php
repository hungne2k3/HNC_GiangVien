<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LecturerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // Định nghĩa lớp middleware
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::user()) {
            // Nếu người dùng đã đăng nhập, tiếp tục xử lý yêu cầu
            return $next($request);
        }

        // Nếu người dùng chưa đăng nhập, chuyển hướng về trang trước đó
        return redirect()->back();
    }
}
