<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachMonHoc extends Model
{
    use HasFactory;

    protected $table = 'danhsach_monhoc';

    protected $fillable = [
        'MaMonHoc',
        'TenMon',
        'SoTin',
        'Nganh_ID',
        'SoTiet',
        'GhiChu'
    ];

    public function monhocKy()
    {
        return $this->hasOne(MonHocKy::class, 'MaMonHoc', 'MaMonHoc');
    }

    public function tb_nganh()
    {
        return $this->belongsTo(Nganh::class, 'Nganh_ID', 'Nganh_ID');
    }

    public function danhsach_diemdanh()
    {
        return $this->hasMany(DanhSachDiemDanh::class, 'MaMonHoc');
    }

    public function danhsach_diemthanhphan()
    {
        return $this->hasMany(DanhSachDiemThanhPhan::class, 'MaMonHoc');
    }

    public function danhsach_diemthi()
    {
        return $this->hasMany(DanhSachDiemThi::class, 'MaMonHoc');
    }
}