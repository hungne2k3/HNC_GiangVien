<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UploadServices
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                // Lấy tên gốc của file bao gồm cả tên và phần mở rộng
                $originalName = $request->file('file')->getClientOriginalName();
        
                // Tạo đường dẫn thư mục theo ngày hiện tại
                $pathFull = 'uploads/' . date("Y/m/d");
        
                // Lưu file vào thư mục 'public' và sử dụng tên gốc của file
                $request->file('file')->storeAs(
                    'public/' . $pathFull,
                    $originalName
                );
        
                // Trả về đường dẫn đầy đủ đến file đã lưu
                return  $pathFull . '/' . $originalName;
            } catch (\Exception $e) {
                return false;
            }
        }        
    }
}