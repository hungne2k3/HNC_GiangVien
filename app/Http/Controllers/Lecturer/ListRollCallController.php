<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Services\ListRollCallServices;
use App\Models\DanhSachDiemDanh;

class ListRollCallController extends Controller
{
    protected $listRollCallServices;

    public function __construct(ListRollCallServices $listRollCallServices)
    {
        $this->listRollCallServices = $listRollCallServices;
    }
    public function index(Request $request, $monHocKyId)
    {
        $title = 'Danh sách điểm danh';

        Carbon::setLocale('vi');

        $currentDate = session('currentDate', Carbon::now('Asia/Ho_Chi_Minh'));

        if (!empty($request->input('selected_date'))) {
            $selectDate = $request->input('selected_date');

            $currentDate = Carbon::parse($selectDate);

            session(['currentDate' => $currentDate]);
        }
        ;

        $danhSachDiemDanh = $this->listRollCallServices->getDataDiemDanh($monHocKyId);

        return view('Lecturer.Layouts.ListRollCall.danhSachDiemDanh', compact('title', 'currentDate', 'danhSachDiemDanh'));
    }

    public function saveRollCall(Request $request)
    {
        // Lấy tất cả dữ liệu từ request (các giá trị từ form gửi lên)
        $data = $request->all();

        // $id: Khóa của mảng, là ID của bản ghi điểm danh (DanhSachDiemDanh).
        // $soTietDiMuon: Giá trị của số tiết đi muộn cho sinh viên tương ứng với ID đó.
        foreach ($data['SoTietDiMuon'] as $id => $soTietDiMuon) {
            $diemDanh = DanhSachDiemDanh::find($id);

            if ($diemDanh) {
                $diemDanh->SoTietDiMuon = $soTietDiMuon;
                // Tìm bản ghi
                $diemDanh->GhiChu = $data['GhiChu'][$id] ?? null;
                $diemDanh->save(); // lưu
            }
        }

        toastify()->success('Lưu điểm danh thành công!');

        return redirect()->route('diemDanhSinhVien');
    }
}