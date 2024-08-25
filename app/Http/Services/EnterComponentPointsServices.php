<?php

namespace App\Http\Services;

use App\Models\DanhSachDiemDanh;
use App\Models\DanhSachDiemThanhPhan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnterComponentPointsServices
{
    public function getDataComponentPoints($monHocKyId)
    {
        // Lấy giảng viên hiện tại
        $user = Auth::user();
        $maGV = $user->MaGV;

        // Tiêu đề Tên môn và tên lớp không viết theo Eloquent Query Builder.
        // Truy vấn để lấy bản ghi duy nhất phù hợp với điều kiện
        $diemThanhPhan = DB::table('danhsach_diemthanhphan')
            ->join('danhsach_monhoc', 'danhsach_monhoc.MaMonHoc', '=', 'danhsach_diemthanhphan.MaMonHoc')
            ->join('sinhvien', 'sinhvien.MaSV', '=', 'danhsach_diemthanhphan.MaSV')
            ->join('monhoc_ky', 'danhsach_monhoc.MaMonHoc', '=', 'monhoc_ky.MaMonHoc')
            ->join('giangvien_monhoc', 'monhoc_ky.id', '=', 'giangvien_monhoc.MonHocKy_ID')
            ->join('lop', 'giangvien_monhoc.MaLop', '=', 'lop.MaLop')
            ->join('tb_hoso', 'sinhvien.HoSo_ID', '=', 'tb_hoso.id')
            ->where('monhoc_ky.id', $monHocKyId)  // Điều kiện lọc dựa trên monhoc_ky.id
            ->select(
                'danhsach_monhoc.TenMon',
                'lop.TenLop'
            )
            ->first(); // Lấy bản ghi đầu tiên phù hợp

        $dataDiemThanhPhan = DanhSachDiemThanhPhan::query()
            ->join('danhsach_monhoc', 'danhsach_monhoc.MaMonHoc', '=', 'danhsach_diemthanhphan.MaMonHoc')
            ->join('sinhvien', 'sinhvien.MaSV', '=', 'danhsach_diemthanhphan.MaSV')
            ->join('monhoc_ky', 'danhsach_monhoc.MaMonHoc', '=', 'monhoc_ky.MaMonHoc')
            ->join('giangvien_monhoc', 'monhoc_ky.id', '=', 'giangvien_monhoc.MonHocKy_ID')
            ->join('lop', 'giangvien_monhoc.MaLop', '=', 'lop.MaLop')
            ->join('tb_hoso', 'sinhvien.HoSo_ID', '=', 'tb_hoso.id')
            ->where('monhoc_ky.id', $monHocKyId)
            ->select(
                'danhsach_monhoc.TenMon',
                'tb_hoso.HoDem',
                'tb_hoso.Ten',
                'danhsach_diemthanhphan.DiemTX1',
                'danhsach_diemthanhphan.DiemDK1',
                'danhsach_diemthanhphan.DiemTX2',
                'danhsach_diemthanhphan.DiemDK2',
                'danhsach_diemthanhphan.DiemTB',
            )
            ->get();

        // dd($dataDiemThanhPhan);

        return compact('diemThanhPhan', 'dataDiemThanhPhan');
    }
}