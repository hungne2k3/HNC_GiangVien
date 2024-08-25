<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnterComponentPointsController extends Controller
{
    public function index()
    {
        $title = 'Nhập điểm thành phần';

        return view('Lecturer.Layouts.EnterComponentPoints.nhapDiemThanhPhan', compact('title'));
    }
}