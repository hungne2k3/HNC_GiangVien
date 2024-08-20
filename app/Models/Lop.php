<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    use HasFactory;

    protected $table = 'lop';
    protected $primaryKey = 'MaLop'; // Đặt 'MaLop' làm khóa chính
    public $incrementing = false; // Nếu 'MaLop' không tự động tăng
    protected $keyType = 'string'; // Nếu 'MaLop' là chuỗi

    protected $fillable = [
        'MaLop',
        'TenLop',
        'Nganh_ID',
        'KhoaHoc_ID',
        'MaGV',
        'GhiChu'
    ];

    public function khoahoc()
    {
        return $this->belongsTo(KhoaHoc::class, 'KhoaHoc_ID');
    }

    public function tb_nganh()
    {
        return $this->belongsTo(Nganh::class, 'Nganh_ID');
    }

    public function lophoc()
    {
        return $this->hasMany(LopHoc::class, 'MaLop', 'MaLop');
    }

    public function hoso_giangvien()
    {
        return $this->belongsTo(User::class, 'MaGV', 'MaGV');
    }

    public function giangvien_monhoc()
    {
        return $this->hasMany(GiangVienMonHoc::class, 'MaLop', 'MaLop');
    }
}