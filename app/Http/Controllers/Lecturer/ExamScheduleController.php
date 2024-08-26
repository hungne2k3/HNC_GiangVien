<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamScheduleController extends Controller
{
    public function index()
    {
        $title = 'Lịch coi thi';

        return view('Lecturer.Layouts.ExamSchedule.lichCoiThi', compact('title'));
    }
}