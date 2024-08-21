<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\StudentAttendanceServices;
use App\Exports\DanhSachDiemDanhExport;
use App\Models\DanhSachDiemDanh;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Log;

class StudentAttendanceController extends Controller
{
    protected $studentAttendanceServices;

    public function __construct(StudentAttendanceServices $studentAttendanceServices)
    {
        $this->studentAttendanceServices = $studentAttendanceServices;
    }

    public function index(Request $request, $monHocKyId = null)
    {
        $title = 'Điểm danh sinh viên';

        $getDataInfo = $this->studentAttendanceServices->getDataInfo();

        return view('Lecturer.Layouts.StudentAttendance.diemDanhSinhVien', compact('title', 'getDataInfo', 'monHocKyId'));
    }

    public function filters(Request $request)
    {
        $title = 'Điểm danh sinh viên';

        $filters = [
            // Lấy giá trị của trường input có tên là hocky từ request. Nếu người dùng đã chọn một học kỳ trong form, giá trị đó sẽ được gán vào hocky. Nếu không có giá trị nào được gửi, nó sẽ là null.
            'hocky' => $request->input('hocky'),
            'monhoc' => $request->input('monhoc'),
            'lop' => $request->input('lop'),
        ];

        $getDataInfo = $this->studentAttendanceServices->getDataInfo($filters);

        return view('Lecturer.Layouts.StudentAttendance.diemDanhSinhVien', compact('title', 'getDataInfo'));
    }

    public function import(Request $request)
    {
        $file = $request->file('import_file');

        // Đây là một phương thức trong lớp IOFactory được sử dụng để tải (load) một tệp Excel vào bộ nhớ
        $spreadsheet = IOFactory::load($file->getRealPath());

        // dùng để lấy ra trang tính (worksheet) hiện đang được kích hoạt trong một tệp Excel.
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        foreach ($rows as $index => $row) {
            if ($index === 0)
                continue;

            try {
                DanhSachDiemDanh::create([
                    'MaSV' => $row[1],
                    'HoTen' => $row[2],
                    'MonHoc' => $row[3],
                    'TenLop' => $row[4],
                    'NgayDiemDanh' => $row[5],
                    'Ca' => $row[6],
                    'Tiet' => $row[7],
                    'SoTietDiMuon' => $row[8],
                    'GhiChu' => $row[9],
                ]);
            } catch (\Exception $e) {
                Log::error("Error creating record for student: " . $row[1] . " - " . $e->getMessage());
                continue;
            }
        }

        return redirect()->back()->with(toastify()->success('Import thành công!'));
    }

    public function export($monHocKyId)
    {
        // Khởi tạo đối tượng DanhSachDiemDanhExport và gọi phương thức export
        $export = new DanhSachDiemDanhExport();
        return $export->export($monHocKyId);
    }
}