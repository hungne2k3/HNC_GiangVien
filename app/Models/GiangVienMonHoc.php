<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangVienMonHoc extends Model
{
    use HasFactory;

    protected $table = 'giangvien_monhoc';

    protected $fillable = [
        'id',
        'MaGV',
        'MaLop',
        'MonHocKy_ID'
    ];

    public function monhoc_ky()
    {
        return $this->belongsTo(MonHocKy::class, 'MonHocKy_ID');
    }

    public function hoso_giangvien()
    {
        return $this->belongsTo(User::class, 'MaGV', 'MaGV');
    }

    public function lop()
    {
        return $this->belongsTo(Lop::class, 'MaLop', 'MaLop');
    }
}