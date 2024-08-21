<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Lecturer\ListRollCallController;
use App\Http\Controllers\Lecturer\StudentAttendanceController;


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
// });

//Giảng viên
Route::middleware(['auth', 'lecturer'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/thay-doi-mat-khau', [ChangePasswordController::class, 'index'])->name('changepassword');
    Route::get('/diem-danh-sinh-vien', [StudentAttendanceController::class, 'index']);
    Route::post('/diem-danh-sinh-vien', [StudentAttendanceController::class, 'filters']);
    Route::get('/danh-sach-diem-danh', [ListRollCallController::class, 'index']);
});

require __DIR__ . '/auth.php';