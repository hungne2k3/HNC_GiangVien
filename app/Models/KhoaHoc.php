<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    use HasFactory;

    // Bảng Khóa Học
    protected $table = 'khoahoc';

    protected $fillable = [
        'id',
        'MaKH',
        'TenKH',
        'NamBD',
        'NamKT',
        'GhiChu'
    ];

    public function lop()
    {
        return $this->hasMany(Lop::class, 'KhoaHoc_ID');
    }

    public function kyhoc()
    {
        return $this->hasMany(KyHoc::class, 'KhoaHoc_ID');
    }
}