<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanToc extends Model
{
    use HasFactory;
    protected $table = 'tb_dantoc';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'MaDanToc',
        'TenDanToc'
    ];
    
    // // public function ()
    // return $;
}