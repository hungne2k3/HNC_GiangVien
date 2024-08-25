<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachDiemThanhPhan extends Model
{
    use HasFactory;

    protected $table = 'danhsach_diemthanhphan';

    protected $fillable = [
        'id',
        'MaSV',
        'MaMonHoc',
        'DiemTX1',
        'DiemDK1',
        'DiemTX2',
        'DiemDK2',
        'DiemTB',
        'khoa'
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