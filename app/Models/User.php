<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    //bảng hồ sơ giảng viên
    protected $table = 'hoso_giangvien';

    protected $primaryKey = 'MaGV';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'MaGV',
        'HoDem',
        'Ten',
        'TenKhac',
        'password',
        'NgaySinh',
        'GioiTinh',
        'DanToc_ID',
        'NoiSinh',
        'QueQuan',
        'DiaChiThuongChu',
        'ChoOHienNay',
        'CCCD',
        'NoiCapCCCD',
        'NgayCapCCCD',
        'SDT',
        'Email',
        'SoBHXH',
        'KinhNghiemLV',
        'NgayTuyenDung',
        'TenNganHang',
        'SoTaiKhoanNganHang',
        'TrinhDoGiaoDucPhoThong',
        'TrinhDo',
        'TrinhDoNgoaiNgu',
        'ChungChiKyNangNghe',
        'ChuyenNganhHoc',
        'CoSoDaoTao',
        'ChungChiNghiepVuSuPham',
        'TinhTrangSucKhoe',
        'ChieuCao',
        'CanNang',
        'NhomMau',
        'HinhAnh',
        'LoaiGV',
        'Nganh_ID',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function tb_nganh()
    {
        return $this->belongsTo(Nganh::class, 'Nganh_ID', 'id');
    }

    public function lop()
    {
        return $this->hasMany(Lop::class, 'MaGV', 'MaGV');
    }

    public function giangvien_monhoc()
    {
        return $this->hasMany(GiangVienMonHoc::class, 'MaGV', 'MaGV');
    }
}