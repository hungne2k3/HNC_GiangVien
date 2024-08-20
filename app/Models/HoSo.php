<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoSo extends Model
{
    use HasFactory;

    protected $table = 'tb_HoSo';

    protected $fillable = [
        'HoDem',
        'Ten',
        'NgayThangNamSinh',
        'GioiTinh',
        'DanToc',
        'CCCD',
        'TenTruong',
        'NamTotNghiep',
        'Email',
        'SDT',
        'MaQuanHuyen',
        'KhuVucUT',
        'DoiTuongUT',
        'MaTinh',
        'MaPhuongXa',
        'DiaChi'
    ];

    public function sinhvien()
    {
        return $this->hasOne(User::class, 'HoSo_ID');
    }

    public function tb_nganh()
    {
        return $this->belongsTo(Nganh::class, 'Nganh_ID');
    }
}