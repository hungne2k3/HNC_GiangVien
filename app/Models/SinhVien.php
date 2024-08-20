<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;

    protected $table = 'sinhvien';

    protected $fillable = [
        'id',
        'email',
        'password',
        'MaSV',
        'AnhChanDung',
        'TrangThaiHoc',
        'GiayTotNghiepTT',
        'CCCD',
        'GiayKhamSucKhoe',
        'GiayKhaiSinh',
        'BanSaoBangTotNghiep',
        'BanSaoHocBa',
        'LyLichSinhVien',
        'Anh3x4'
    ];

    public function hoSo()
    {
        return $this->belongsTo(HoSo::class, 'HoSo_ID');
    }

    public function lophoc()
    {
        return $this->hasMany(LopHoc::class, 'SinhVien_ID');
    }

    public function kyhoc()
    {
        return $this->belongsToMany(KyHoc::class, 'lophoc', 'SinhVien_ID', 'KyHoc_ID');
    }
}