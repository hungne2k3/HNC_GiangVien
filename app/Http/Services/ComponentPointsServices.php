<?php

namespace App\Http\Services;

use App\Models\DanhSachDiemThanhPhan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\GiangVienMonHoc;

class ComponentPointsServices
{
    public function getInfo($filters = [])
    {
        // Lấy giảng viên hiện tại
        $user = Auth::user();
        $maGV = $user->MaGV;

        if (!$maGV) {
            return [];
        }

        // Lấy thông tin giảng viên, bao gồm MaLop và TenLop
        $gv = DB::table('hoso_giangvien')
            ->join('lop', 'hoso_giangvien.MaGV', '=', 'lop.MaGV')
            ->where('hoso_giangvien.MaGV', $maGV)
            ->select('lop.MaLop', 'lop.TenLop', 'lop.Nganh_ID')
            ->get();

        if ($gv->isEmpty()) {
            return [];
        }

        // Lấy danh sách MaLop từ giảng viên
        $maLop = $gv->pluck('MaLop');
        $nganhID = $gv->pluck('Nganh_ID')->first();

        // Lấy danh sách kỳ học liên quan đến các lớp dựa trên MaLop
        $kyHoc = DB::table('kyhoc')
            ->whereIn('KhoaHoc_ID', function ($query) use ($maLop) {
                $query->select('lop.KhoaHoc_ID')
                    ->from('lop')
                    ->whereIn('MaLop', $maLop);
            })
            ->select('kyhoc.id', 'kyhoc.TenKy', DB::raw('YEAR(kyhoc.ThoiGianBD) as NamBD'), DB::raw('YEAR(kyhoc.ThoiGianKT) as NamKT'))
            ->get();

        // Lấy danh sách môn học dựa theo Nganh_ID
        $monHoc = DB::table('danhsach_monhoc')
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
        $dataQuery = GiangVienMonHoc::query()
            ->join('monhoc_ky', 'giangvien_monhoc.MonHocKy_ID', '=', 'monhoc_ky.id')
            ->join('lop', 'giangvien_monhoc.MaLop', '=', 'lop.MaLop')
            ->join('danhsach_monhoc', 'monhoc_ky.MaMonHoc', '=', 'danhsach_monhoc.MaMonHoc')
            ->join('hoso_giangvien', 'giangvien_monhoc.MaGV', '=', 'hoso_giangvien.MaGV')
            ->select(
                'danhsach_monhoc.TenMon',
                'danhsach_monhoc.MaMonHoc',
                'danhsach_monhoc.SoTin',
                'danhsach_monhoc.SoTiet',
                'lop.TenLop',
                'monhoc_ky.id'
            )
            ->where('hoso_giangvien.MaGV', $maGV)
            ->distinct();

        // điều khiện để lọc
        if (!empty($filters['hocKy'])) {
            $dataQuery->where('monhoc_ky.KyHoc_id', $filters['hocKy']);
        }

        if (!empty($filters['monHoc'])) {
            $dataQuery->where('danhsach_monhoc.MaMonHoc', $filters['monHoc']);
        }

        if (!empty($filters['lop'])) {
            $dataQuery->where('giangvien_monhoc.MaLop', $filters['lop']);
        }

        $dataInfoQuery = $dataQuery->get();

        return compact('gv', 'kyHoc', 'monHoc', 'monHocKy', 'dataInfoQuery');
    }

    public function getDataDiemThanhPhan($monHocKyId)
    {
        $dataDiemThanhPhan = DanhSachDiemThanhPhan::query()
            ->join('danhsach_monhoc', 'danhsach_monhoc.MaMonHoc', '=', 'danhsach_diemthanhphan.MaMonHoc')
            ->join('sinhvien', 'sinhvien.MaSV', '=', 'danhsach_diemthanhphan.MaSV')
            ->join('monhoc_ky', 'danhsach_monhoc.MaMonHoc', '=', 'monhoc_ky.MaMonHoc')
            ->join('giangvien_monhoc', 'monhoc_ky.id', '=', 'giangvien_monhoc.MonHocKy_ID')
            ->join('lop', 'giangvien_monhoc.MaLop', '=', 'lop.MaLop')
            ->join('tb_hoso', 'sinhvien.HoSo_ID', '=', 'tb_hoso.id')
            ->where('monhoc_ky.id', $monHocKyId)
            ->select(
                'sinhvien.MaSV',
                'danhsach_monhoc.TenMon',
                'danhsach_monhoc.MaMonHoc',
                'tb_hoso.HoDem',
                'tb_hoso.Ten',
                'danhsach_diemthanhphan.DiemTX1',
                'danhsach_diemthanhphan.DiemDK1',
                'danhsach_diemthanhphan.DiemTX2',
                'danhsach_diemthanhphan.DiemDK2',
                'danhsach_diemthanhphan.DiemThi',
                'danhsach_diemthanhphan.DiemTB',
            )
            ->get();

        return $dataDiemThanhPhan;
    }
}