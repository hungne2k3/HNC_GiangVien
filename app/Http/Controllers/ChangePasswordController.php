<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ChangePasswordController extends Controller
{
    public function index()
    {
        $title = 'Đổi mật khẩu';

        return view('profile.partials.update-password-form', compact('title'));
    }

}