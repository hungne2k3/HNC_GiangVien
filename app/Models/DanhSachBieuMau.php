<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachBieuMau extends Model
{
    use HasFactory;

    protected $table = 'danhsach_bieumau';

    protected $fillable = [
        'id',
        'TenBieuMau',
        'file_path',
    ];
}