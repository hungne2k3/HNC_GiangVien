<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\DanhSachBieuMau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Redot\LaravelToastify\Toastify;

class ListOfFormsController extends Controller
{
    public function index()
    {
        $title = 'Danh sách biểu mẫu';

        $files = DanhSachBieuMau::all();

        return view('Lecturer.Layouts.ListOfForms.danhSachBieuMau', compact('title', 'files'));
    }

    public function upload(Request $request, $id)
    {
        // Validate request để đảm bảo rằng có file Word được upload
        $request->validate([
            // // Chỉ chấp nhận file .doc và .docx, giới hạn kích thước 2MB
            'file' => 'required|file|mimes:doc,docx|max:2048',
        ]);

        // lấy file từ request
        $file = $request->file('file');

        // lưu file vào thư mục 'upload' và lấy đường dẫn
        $filePath = $file->store('uploads');

        // Tìm bản ghi dựa trên ID
        // 'findOrFail' là một phương thức của Eloquent ORM trong Laravel, được sử dụng để tìm một bản ghi trong cơ sở dữ liệu theo ID.
        $existingFile = DanhSachBieuMau::findOrFail($id);

        // Cập nhật trường file_path với đường dẫn mới
        $existingFile->update([
            'file_path' => $filePath,
        ]);

        toastify()->success('File được tải lên thành công!');

        return redirect()->back();
    }

    public function download($id)
    {
        // Tìm bản ghi theo ID và tải file xuống
        $file = DanhSachBieuMau::findOrFail($id);

        //  lấy phần mở rộng của file
        $fileExtension = pathinfo($file->file_path, PATHINFO_EXTENSION); //Lấy phần mở rộng (extension) của file từ đường dẫn.

        // Tạo tên file tùy chỉnh khi tải về
        $customNameFile = 'BIỂU_MẪU_' . $file->TenBieuMau . '.' . $fileExtension;

        // dd($customNameFile);

        return Storage::download($file->file_path, $customNameFile);
    }
}