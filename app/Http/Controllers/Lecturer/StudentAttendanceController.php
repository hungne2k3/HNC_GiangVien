<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\StudentAttendanceServices;

class StudentAttendanceController extends Controller
{
    protected $studentAttendanceServices;

    public function __construct(StudentAttendanceServices $studentAttendanceServices)
    {
        $this->studentAttendanceServices = $studentAttendanceServices;
    }

    public function index(Request $request)
    {
        $title = 'Điểm danh sinh viên';

        $getDataInfo = $this->studentAttendanceServices->getDataInfo();

        return view('Lecturer.Layouts.StudentAttendance.diemDanhSinhVien', compact('title', 'getDataInfo'));
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
}