<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Trang Chủ';

        return view('Lecturer.Layouts.Home.home', compact('title'));
    }
}