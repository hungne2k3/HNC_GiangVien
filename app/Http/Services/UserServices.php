<?php

// app/Services/UserService.php
namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserServices
{
    public function lecturerInfomation() 
    {
        // Lấy giảng viên hiện tại
        $user = Auth::user();
        $maGV = $user->MaGV;

        if (!$maGV) {
            return [];
        }

        // Lấy thông tin giảng viên từ db
        $giangVien = User::where('MaGV', $maGV)
            ->first()
            ->makeHidden('password'); // Sử dụng Eloquent để loại trừ trường password

        if (!$giangVien) {
            return [];
        }

        return $giangVien; // Trả về đối tượng giảng viên
    }
}
