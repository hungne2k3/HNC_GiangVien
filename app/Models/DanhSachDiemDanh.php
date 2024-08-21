<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachDiemDanh extends Model
{
    use HasFactory;

    protected $table = 'danhsach_diemdanh';

    protected $fillable = [
        'id',
        'MaSV',
        'MaMonHoc',
        'TietBD',
        'TietKT',
        'Ca',
        'SoTietDiMuon',
        'NgayDiemDanh',
        'GhiChu'
    ];

    public function sinhvien()
    {
        return $this->belongsTo(SinhVien::class, 'MaSV');
    }

    public function danhsach_monhoc()
    {
        return $this->belongsTo(DanhSachMonHoc::class, 'MaMonHoc');
    }

    public function danhsach_diemdanh()
    {
        return $this->hasMany(DanhSachDiemDanh::class, 'MaSV');
    }
}