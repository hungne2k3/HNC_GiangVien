<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HosoGiangVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('hoso_giangvien')->insert([
            [
                'MaGV' => '2109610335',
                'HoDem' => 'Phạm Xuân',
                'Ten' => 'Huy',
                'TenKhac' => '',
                'password' => Hash::make('2109610335'),
                'NgaySinh' => '2003-11-11',
                'GioiTinh' => 'Nam',
                'DanToc_ID' => 26, // ID của dân tộc tương ứng
                'NoiSinh' => 'Hải Dương',
                'QueQuan' => 'Hải Dương',
                'DiaChiThuongChu' => '123 Địa chỉ, Hải Dương',
                'ChoOHienNay' => '123 Địa chỉ hiện tại, Hải Dương',
                'CCCD' => '0123456789',
                'NoiCapCCCD' => 'Hải Dương',
                'NgayCapCCCD' => '2020-01-01',
                'SDT' => '0987654321',
                'Email' => 'huy@example.com',
                'SoBHXH' => 'BHXH123456',
                'KinhNghiemLV' => '5 years',
                'NgayTuyenDung' => '2024-01-01',
                'TenNganHang' => 'Vietcombank',
                'SoTaiKhoanNganHang' => '1234567890',
                'TrinhDoGiaoDucPhoThong' => 'Đại học',
                'TrinhDo' => 'Thạc sĩ',
                'TrinhDoNgoaiNgu' => 'IELTS 7.5',
                'ChungChiKyNangNghe' => 'Chứng chỉ ABC',
                'ChuyenNganhHoc' => 'Công nghệ thông tin',
                'CoSoDaoTao' => 'Trường Cao Đẳng Công Nghệ Bách Khoa Hà Nội',
                'ChungChiNghiepVuSuPham' => 'Chứng chỉ A',
                'TinhTrangSucKhoe' => 'Tốt',
                'ChieuCao' => '168 cm',
                'CanNang' => '53 kg',
                'NhomMau' => 'O',
                'HinhAnh' => 'huy.jpg',
                'LoaiGV' => 'Giảng viên chính thức',
                'Nganh_ID' => 1, // ID của ngành tương ứng
                'CREATEO_BY' => 'admin',
                'CREATEO_DATE' => now(),
                'UPDATEO_BY' => 'admin',
                'UPDATEO_DATE' => now(),
                'DELETEO_BY' => null,
                'DELETEO_DATE' => null,
                'GhiChu' => 'Thông tin bổ sung nếu có',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
