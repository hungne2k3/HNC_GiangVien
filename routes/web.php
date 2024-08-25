<?php

use App\Http\Controllers\Lecturer\ListOfFormsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lecturer\ComponentPointsController;
use App\Http\Controllers\Lecturer\EnterComponentPointsController;
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

    // diem danh
    Route::get('/diem-danh-sinh-vien', [StudentAttendanceController::class, 'index'])->name('diemDanhSinhVien');
    Route::post('/diem-danh-sinh-vien', [StudentAttendanceController::class, 'filters']);

    // danh sach diem danh
    Route::get('/danh-sach-diem-danh/{id}', [ListRollCallController::class, 'index']);
    Route::post('/save-rollCall', [ListRollCallController::class, 'saveRollCall'])->name('save.rollcall');

    // import
    Route::post('/import-rollcall', [StudentAttendanceController::class, 'import'])->name('import.rollcall');
    // export
    Route::get('/export-rollcall/{monHocKyId}', [StudentAttendanceController::class, 'export'])->name('export.rollcall');

    // Điểm thành phần
    Route::get('/diem-thanh-phan', [ComponentPointsController::class, 'index']);
    Route::post('/diem-thanh-phan', [ComponentPointsController::class, 'filters']);

    // Nhập điểm thành phần
    Route::get('/nhap-diem-thanh-phan/{id}', [EnterComponentPointsController::class, 'index']);

    // Danh sách biểu mẫu
    Route::get('/danh-sach-bieu-mau', [ListOfFormsController::class, 'index']);

    Route::post('/danh-sach-bieu-mau/{id}', [ListOfFormsController::class, 'upload'])->name('files.upload');

    Route::get('/danh-sach-bieu-mau/{id}', [ListOfFormsController::class, 'download'])->name('files.download');
});

require __DIR__ . '/auth.php';