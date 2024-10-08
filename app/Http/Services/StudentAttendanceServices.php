<?php

namespace App\Http\Services;

use App\Models\DanhSachDiemDanh;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\GiangVienMonHoc;

class StudentAttendanceServices
{
    public function getDataInfo($filters = [])
    {
        // Lấy giảng viên hiện tại
        $user = Auth::user();
        $maGV = $user->MaGV;

        if (!$maGV) {
            return [];
        }

        // Lấy thông tin giảng viên, bao gồm MaLop và TenLop
        $giangVien = DB::table('hoso_giangvien')
            ->join('lop', 'hoso_giangvien.MaGV', '=', 'lop.MaGV')
            ->where('hoso_giangvien.MaGV', $maGV)
            ->select('lop.MaLop', 'lop.TenLop', 'lop.Nganh_ID')
            ->get();

        if ($giangVien->isEmpty()) {
            return [];
        }

        // Lấy danh sách MaLop từ giảng viên
        $maLops = $giangVien->pluck('MaLop');
        $nganhID = $giangVien->pluck('Nganh_ID')->first();

        // Lấy danh sách kỳ học liên quan đến các lớp dựa trên MaLop
        $kyHocs = DB::table('kyhoc')
            ->whereIn('KhoaHoc_ID', function ($query) use ($maLops) {
                $query->select('lop.KhoaHoc_ID')
                    ->from('lop')
                    ->whereIn('MaLop', $maLops);
            })
            ->select('kyhoc.id', 'kyhoc.TenKy', DB::raw('YEAR(kyhoc.ThoiGianBD) as NamBD'), DB::raw('YEAR(kyhoc.ThoiGianKT) as NamKT'))
            ->get();

        // Lấy danh sách môn học dựa theo Nganh_ID
        $monHocs = DB::table('danhsach_monhoc')
            ->where('danhsach_monhoc.Nganh_ID', $nganhID)
            ->select('danhsach_monhoc.MaMonHoc', 'danhsach_monhoc.TenMon', 'danhsach_monhoc.SoTiet', 'danhsach_monhoc.SoTin')
            ->get();

        // dd($monHocs);

        // Lấy các môn học mà giảng viên dạy
        $monHocKy = DB::table('giangvien_monhoc')
            ->join('monhoc_ky', 'giangvien_monhoc.MonHocKy_ID', '=', 'monhoc_ky.id')
            ->join('danhsach_monhoc', 'monhoc_ky.MaMonHoc', '=', 'danhsach_monhoc.MaMonHoc')
            ->where('giangvien_monhoc.MaGV', $maGV)
            ->select('giangvien_monhoc.MonHocKy_ID', 'danhsach_monhoc.TenMon')
            ->get();

        // Lấy danh sách môn học với thông tin TenMon, SoTin, SoTiet, TenLop
        $dataInfoQuery = GiangVienMonHoc::query()
            ->join('monhoc_ky', 'giangvien_monhoc.MonHocKy_ID', '=', 'monhoc_ky.id')
            ->join('lop', 'giangvien_monhoc.MaLop', '=', 'lop.MaLop')
            ->join('danhsach_monhoc', 'monhoc_ky.MaMonHoc', '=', 'danhsach_monhoc.MaMonHoc')
            ->join('hoso_giangvien', 'giangvien_monhoc.MaGV', '=', 'hoso_giangvien.MaGV')
            ->select(
                'danhsach_monhoc.TenMon',
                'danhsach_monhoc.MaMonHoc',
                'danhsach_monhoc.SoTin',
                'danhsach_monhoc.SoTiet',
                'hoso_giangvien.HoDem',
                'hoso_giangvien.Ten',
                'lop.TenLop',
                'monhoc_ky.id'
            )
            ->where('hoso_giangvien.MaGV', $maGV)
            ->distinct();

        // điều khiện để lọc
        if (!empty($filters['hocky'])) {
            $dataInfoQuery->where('monhoc_ky.KyHoc_id', $filters['hocky']);
        }

        if (!empty($filters['monhoc'])) {
            $dataInfoQuery->where('danhsach_monhoc.MaMonHoc', $filters['monhoc']);
        }

        if (!empty($filters['lop'])) {
            $dataInfoQuery->where('giangvien_monhoc.MaLop', $filters['lop']);
        }

        $dataInfo = $dataInfoQuery->get();

        return compact('giangVien', 'kyHocs', 'monHocs', 'monHocKy', 'dataInfo');
    }

    public function getDanhSachDiemDanh($monHocKyId)
    {
        // Truy vấn dữ liệu với điều kiện dựa trên monhoc_ky.id
        $danhSachDiemDanh = DanhSachDiemDanh::query()
            ->join('sinhvien', 'sinhvien.MaSV', '=', 'danhsach_diemdanh.MaSV')
            ->join('danhsach_monhoc', 'danhsach_monhoc.MaMonHoc', '=', 'danhsach_diemdanh.MaMonHoc')
            ->join('monhoc_ky', 'danhsach_monhoc.MaMonHoc', '=', 'monhoc_ky.MaMonHoc')
            ->join('tb_hoso', 'sinhvien.HoSo_ID', '=', 'tb_hoso.id')
            ->join('giangvien_monhoc', 'monhoc_ky.id', '=', 'giangvien_monhoc.MonHocKy_ID')
            ->join('lop', 'giangvien_monhoc.MaLop', '=', 'lop.MaLop')
            ->where('monhoc_ky.id', $monHocKyId)  // Điều kiện lọc dựa trên monhoc_ky.id
            ->select(
                'danhsach_monhoc.TenMon',
                'danhsach_diemdanh.id',
                'danhsach_diemdanh.TietBD',
                'danhsach_diemdanh.TietKT',
                'danhsach_diemdanh.Ca',
                'danhsach_diemdanh.SoTietDiMuon',
                'danhsach_diemdanh.NgayDiemDanh',
                'danhsach_diemdanh.GhiChu',
                'tb_hoso.HoDem',
                'tb_hoso.Ten',
                'sinhvien.MaSV',
                'lop.TenLop'
            )
            ->get();

        return $danhSachDiemDanh;
    }
}