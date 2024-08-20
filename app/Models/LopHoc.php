<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    use HasFactory;

    protected $table = 'lophoc';

    protected $fillable = [
        'id',
        'SinhVien_ID',
        'MaLop',
        'GhiChu'
    ];

    public function sinhvien()
    {
        return $this->belongsTo(User::class, 'SinhVien_ID');
    }

    public function lop()
    {
        return $this->belongsTo(Lop::class, 'MaLop');
    }
}