<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComponentPointsController extends Controller
{
    public function index()
    {
        $title = "Điểm thành phần";

        return view('Lecturer.Layouts.ComponentPoints.diemThanhPhan', compact('title'));
    }
}