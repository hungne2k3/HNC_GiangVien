<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KyHoc extends Model
{
    use HasFactory;

    protected $table = 'kyhoc';

    protected $fillable = [
        'id',
        'KhoaHoc_ID',
        'TenKy',
        'ThoiGianBD',
        'ThoiGianKT',
        'GhiChu'
    ];

    public function khoahoc()
    {
        return $this->belongsTo(KhoaHoc::class, 'KhoaHoc_ID');
    }

    public function monhocKy()
    {
        return $this->hasMany(MonHocKy::class, 'KyHoc_ID');
    }

    public function danhsachMonhoc()
    {
        return $this->hasManyThrough(DanhSachMonHoc::class, MonHocKy::class, 'KyHoc_ID', 'MaMonHoc', 'id', 'MaMonHoc');
    }

    // // thiết lập mối quan hệ nhiều-nhiều với model User thông qua bảng trung gian LopHoc.
    public function sinhvien()
    {
        return $this->belongsToMany(User::class, 'lophoc', 'KyHoc_ID', 'SinhVien_ID');
    }
}