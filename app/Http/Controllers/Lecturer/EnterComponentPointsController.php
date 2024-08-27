<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\EnterComponentPointsServices;
use App\Models\DanhSachDiemThanhPhan;

class EnterComponentPointsController extends Controller
{
    protected $enterComponentPointsServices;

    public function __construct(EnterComponentPointsServices $enterComponentPointsServices)
    {
        $this->enterComponentPointsServices = $enterComponentPointsServices;
    }

    public function index($monHocKyId)
    {
        $title = 'Nhập điểm thành phần';

        $getComponentPoints = $this->enterComponentPointsServices->getDataComponentPoints($monHocKyId);

        return view('Lecturer.Layouts.EnterComponentPoints.nhapDiemThanhPhan', compact('title', 'getComponentPoints'));
    }

    public function update(Request $request)
    {
        // lấy dữ liệu từ form
        $diemData = $request->input('diem');

        // kiểm tra xem có tồn tại dữ liệu
        if (!$diemData || !is_array($diemData)) {
            toastify()->warning('Dữ liệu điểm không hợp lệ!');

            return redirect()->back();
        }

        // lặp qua các phần tử điểm để cập nhập vào cơ sở dữ liệu
        foreach ($diemData as $data) {
            // kiểm tra sự tồn tại của các trường trước khi cập nhập
            if (!isset($data['DiemTX1']) || !isset($data['DiemDK1']) || !isset($data['DiemTX2']) || !isset($data['DiemDK2']) || !isset($data['DiemThi']) || !isset($data['DiemTB']) || !isset($data['GhiChu'])) {
                toastify()->warning('Thiếu dữ liệu cho sinh viên!');

                // bỏ qua các bản ghi thiếu và tiếp tục các bản ghi khác
                continue;
            }

            // tìm bản ghi điểm của sinh viên theo mã sinh viên, mã môn học
            $diemThanhPhan = DanhSachDiemThanhPhan::where('MaSV', $data['MaSV'])
                ->where('MaMonHoc', $data['MaMonHoc'])
                ->first();

            if ($diemThanhPhan) {
                // cập nhập điểm thành phần cho sinh viên
                $diemThanhPhan->DiemTX1 = $data['DiemTX1'];
                $diemThanhPhan->DiemDK1 = $data['DiemDK1'];
                $diemThanhPhan->DiemTX2 = $data['DiemTX2'];
                $diemThanhPhan->DiemDK2 = $data['DiemDK2'];
                $diemThanhPhan->DiemThi = $data['DiemThi'];
                $diemThanhPhan->DiemTB = $data['DiemTB'];
                $diemThanhPhan->GhiChu = $data['GhiChu'];

                // lưu các thay đổi vào db
                try {
                    $diemThanhPhan->save();
                    toastify()->success('Lưu điểm thành phần cho sinh viên ' . $data['MaSV'] . ' thành công.');

                } catch (\Exception $e) {
                    toastify()->error('Lỗi khi lưu điểm cho sinh viên ' . $data['MaSV'] . '.');
                }
            } else {
                toastify()->warning('Không tìm thấy sinh viên với mã số ' . $data['MaSV'] . '.');
            }
        }

        return redirect()->back();
    }


}