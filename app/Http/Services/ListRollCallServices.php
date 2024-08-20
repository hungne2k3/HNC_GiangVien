<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Lop;
use App\Models\KyHoc;
use App\Models\DanhSachMonHoc;
use App\Models\GiangVienMonHoc;

class ListRollCallServices
{
    public function getDataInfo($filters = [])
    {
        // Lấy giảng viên hiện tại
        $user = Auth::user();
        $maGV = $user->MaGV;

        if (!$maGV) {
            return [];
        }
    }
}