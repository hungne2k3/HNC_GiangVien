<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\EnterComponentPointsServices;

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
}