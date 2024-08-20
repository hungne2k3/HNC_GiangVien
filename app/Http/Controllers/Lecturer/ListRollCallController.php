<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ListRollCallController extends Controller
{

    public function __construct()
    {

    }
    public function index(Request $request)
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

        return view('Lecturer.Layouts.ListRollCall.danhSachDiemDanh', compact('title', 'currentDate'));
    }
}