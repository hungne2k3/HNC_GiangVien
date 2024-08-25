<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachDiemThi extends Model
{
    use HasFactory;

    protected $table = 'danhsach_diemthi';

    protected $fillable = [
        'id',
        'MaSV',
        'MaMonHoc',
        'DiemThiLan1',
        'DiemThiLan2',
        'DiemTrungBinhCaKy',
        'khoa',
    ];

    public function sinhvien()
    {
        return $this->belongsTo(SinhVien::class, 'MaSV');
    }

    public function danhsach_monhoc()
    {
        return $this->belongsTo(DanhSachMonHoc::class, 'MaMonHoc');
    }
}