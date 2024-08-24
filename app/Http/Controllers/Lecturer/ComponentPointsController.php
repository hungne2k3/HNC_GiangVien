<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\ComponentPointsServices;

class ComponentPointsController extends Controller
{
    protected $componentPointsServices;
    public function __construct(ComponentPointsServices $componentPointsServices)
    {
        $this->componentPointsServices = $componentPointsServices;
    }

    public function index()
    {
        $title = "Điểm thành phần";

        $getInfo = $this->componentPointsServices->getInfo();

        return view('Lecturer.Layouts.ComponentPoints.diemThanhPhan', compact('title', 'getInfo'));
    }

    public function filters(Request $request)
    {
        $title = 'Điểm thành phần';

        $filters = [
            // Lấy giá trị của trường input có tên là hocky từ request. Nếu người dùng đã chọn một học kỳ trong form, giá trị đó sẽ được gán vào hocky. Nếu không có giá trị nào được gửi, nó sẽ là null.
            'hocKy' => $request->input('hocKy') !== '1' ? $request->input('hocKy') : null,
            'monHoc' => $request->input('monHoc') !== '1' ? $request->input('monHoc') : null,
            'lop' => $request->input('lop') !== '1' ? $request->input('lop') : null,
        ];

        $getInfo = $this->componentPointsServices->getInfo($filters);

        return view('Lecturer.Layouts.ComponentPoints.diemThanhPhan', compact('title', 'getInfo'));
    }
}