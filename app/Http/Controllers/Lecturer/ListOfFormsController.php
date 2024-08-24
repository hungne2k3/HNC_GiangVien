<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListOfFormsController extends Controller
{
    public function index()
    {
        $title = 'Danh sách biểu mẫu';

        return view('Lecturer.Layouts.ListOfForms.danhSachBieuMau', compact('title'));
    }
}