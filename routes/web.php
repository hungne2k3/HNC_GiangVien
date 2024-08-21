<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lecturer\ListRollCallController;
use App\Http\Controllers\Lecturer\StudentAttendanceController;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
// });

//Giảng viên
Route::middleware(['auth', 'lecturer'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/diem-danh-sinh-vien', [StudentAttendanceController::class, 'index'])->name('diemDanhSinhVien');
    Route::post('/diem-danh-sinh-vien', [StudentAttendanceController::class, 'filters']);
    Route::get('/danh-sach-diem-danh/{id}', [ListRollCallController::class, 'index']);
    Route::post('/save-rollCall', [ListRollCallController::class, 'saveRollCall'])->name('save.rollcall');
});

require __DIR__ . '/auth.php';