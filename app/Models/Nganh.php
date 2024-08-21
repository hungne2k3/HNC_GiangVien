<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    use HasFactory;

    // Bảng Ngành
    protected $table = 'tb_nganh';

    protected $fillable = [
        'id',
        'MaNganh',
        'TenNganh',
        'GhiChu'
    ];

    // Các mối quan hệ giữa các bảng: hasOne(1), belongsTo(1), hasMany(n)
    public function lop()
    {
        return $this->hasOne(Lop::class, 'Nganh_ID', 'Nganh_ID');
    }

    public function HoSo()
    {
        return $this->belongsTo(HoSo::class);
    }

    public function danhsachmonhoc()
    {
        return $this->hasOne(DanhSachMonHoc::class, 'Nganh_ID', 'Nganh_ID');
    }

    public function hoso_giangvien()
    {
        return $this->hasMany(User::class, 'Nganh_ID', 'Nganh_ID');
    }
}