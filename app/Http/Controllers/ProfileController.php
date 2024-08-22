<?php
// app/Http/Controllers/LecturerController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nganh;
use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\UploadServices;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    protected $userServices, $uploadServices;

    // Constructor để inject UserServices và UploadServices
    public function __construct(UserServices $userServices, UploadServices $uploadServices)
    {
        $this->userServices = $userServices;
        $this->uploadServices = $uploadServices;
    }

    // Hàm để lấy thông tin giảng viên và trả về view
    public function index()
    {
        // Lấy thông tin giảng viên từ Service
        $giangVien = $this->userServices->lecturerInfomation();
        $nganh = $this->userServices->getNganh();
        
        // dd($giangVien);
        return view('profile.thongtinGiangvien', [
            'title' => 'Thông tin giảng viên',
            'giangVien' => $giangVien,
            'nganh' => $nganh
        ]);
    }

    // Hàm upload ảnh
    public function uploadProfilePicture(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $giangVien = $this->userServices->lecturerInfomation();
        $imagePath = $this->uploadServices->store($request);

        if ($imagePath) {
            // Xóa ảnh cũ nếu có
            if ($giangVien->HinhAnh) {
                Storage::delete('public/' . $giangVien->HinhAnh);
            }

            // Cập nhật ảnh mới
            $giangVien->HinhAnh = $imagePath;
            $giangVien->save(); // Lưu thông tin vào bảng hoso_giangvien

            return redirect()->back()->with('success', 'Upload thành công.');
        }

        return redirect()->back()->with('error', 'Upload thất bại.');
    }
}