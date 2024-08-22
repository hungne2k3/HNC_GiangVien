@extends('Lecturer.DefaultLayout.main')
@section('content')
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('asset/css/profile.css') }}">

    <div class="grid container">
        <div class="row">
            <div class="col l-12">
                <h2 style="text-align: center">Thông Tin Giảng Viên</h3>
            </div>
        </div>
        <div class="row flex" style="padding-top: 15px">
            <div class="col l-3">
                <div class="avatar" style="display: flex; justify-content: center; align-item: center">
                    <!-- Hiển thị ảnh hiện tại -->
                    <img src="{{ asset('storage/' . ($giangVien->HinhAnh ?? 'default-profile.png')) }}" alt="Profile Picture" id="imagePreview"
                        style="width: 296px; border-radius: 50%; height: 296px; border: 2px solid #ccc">
                </div>

                {{-- {{ dd($giangVien) }} --}}
                <div class="vcard-name" style="text-align: left; padding: 16px 0">
                    <span style="font-size: 24px; line-height: 1.25; color: #1f2328; font-weight: 500">{{ $giangVien->HoDem . ' ' .$giangVien->Ten }}</span><br>
                    <span style="font-size: 20px; line-height: 24px; color: #636c76; font-weight: 300">{{ $giangVien->MaGV}}</span><br>
                    <span style="font-size: 20px; line-height: 1.25; color: #1f2328; font-weight: 500; text-transform: capitalize">{{ $nganh->TenNganh }}</span><br>
                </div>

                <!-- Form để upload ảnh mới -->
                <form action="{{ route('profile.uploadAvatar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="form-input" class="btn" type="file" name="file" accept="image/*" id="uploadInput" 
                        style="display: none;" onchange="this.form.submit();">
                    <button type="button" onclick="document.getElementById('uploadInput').click();" 
                        class="btn btn--outline" style="width: 100%;">Thay đổi ảnh đại diện</button>
                </form>
            </div>
            <div class="col l-9">
                {{-- view-edit-section --}}
                <div class="view-edit-section form-container">
                    <form action="#" method="POST">
                        {{-- Thông tin chung --}}
                        <div class="info-common">
                            <div class="form__title p-4" style="margin: 0">
                                <svg style="display: flex; margin-bottom: 5px" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="29" height="29" x="0" y="0" viewBox="0 0 511.277 511.277" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                    <path d="M470.375 186.654h-30.471v-3.422c0-8.518-6.93-15.447-15.448-15.447h-60.097c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h60.097c.247 0 .448.2.448.447v91.447c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-73.025h30.471c1.014 0 1.839.825 1.839 1.839v261.658c0 17.163-13.963 31.126-31.126 31.126H70.19c-17.163 0-31.126-13.963-31.126-31.126V203.493c0-1.014.825-1.839 1.839-1.839h31.471v256.513c0 10.576 8.604 19.181 19.181 19.181h329.167c10.577 0 19.181-8.604 19.181-19.181V306.668c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v107.931H303.559c-15.716 0-29.9 6.646-39.92 17.262v-97.015c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v97.016c-10.02-10.616-24.205-17.262-39.92-17.262h-34.08c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h34.08c19.563 0 35.873 14.149 39.263 32.748H91.555a4.185 4.185 0 0 1-4.181-4.181V429.6h55.275c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5H87.374V183.232c0-.247.201-.447.448-.447h60.097c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5H87.822c-8.518 0-15.448 6.93-15.448 15.447v3.422H40.903c-9.285 0-16.839 7.554-16.839 16.839v261.658c0 25.434 20.692 46.126 46.126 46.126h370.896c25.434 0 46.126-20.692 46.126-46.126V203.493c.001-9.285-7.552-16.839-16.837-16.839zM303.559 429.599h121.344v28.568a4.185 4.185 0 0 1-4.181 4.181H264.297c3.389-18.6 19.699-32.749 39.262-32.749z" fill="#000000" opacity="1" data-original="#000000" class=""></path><path d="M156.143 105.231c4.117.382 7.782-2.639 8.171-6.763 2.145-22.744 12.647-43.802 29.575-59.294C210.922 23.586 233.029 15 256.139 15c50.863 0 92.243 41.38 92.243 92.242 0 19.139-5.809 37.493-16.798 53.081a9.67 9.67 0 0 0-.181.268l-47.994 74.718a7.5 7.5 0 0 0-1.19 4.054v9.716a3.58 3.58 0 0 1-3.576 3.576h-.49l4.778-81.075h8.544c12.226 0 22.172-9.946 22.172-22.171v-.91c0-12.225-9.946-22.171-22.172-22.171-11.721 0-21.443 9.166-22.133 20.867l-.553 9.385h-26.301l-.553-9.385c-.689-11.701-10.412-20.867-22.133-20.867-12.226 0-22.172 9.946-22.172 22.171v.91c0 12.225 9.946 22.171 22.172 22.171h8.544l4.775 81.023c-1.727-.252-3.062-1.728-3.062-3.524v-9.716a7.508 7.508 0 0 0-1.189-4.054l-47.995-74.718a7.833 7.833 0 0 0-.18-.268 91.383 91.383 0 0 1-14.442-32.336 7.5 7.5 0 0 0-14.619 3.361 106.318 106.318 0 0 0 16.707 37.482l46.72 72.732v7.515c0 7.573 4.561 14.092 11.076 16.981v12.683c0 13.346 10.857 24.203 24.203 24.203h11.604c13.345 0 24.203-10.857 24.203-24.203v-12.683c6.514-2.889 11.076-9.407 11.076-16.981v-7.515l46.719-72.732c12.72-18.101 19.443-39.395 19.443-61.589C363.381 48.108 315.272 0 256.139 0c-26.868 0-52.572 9.983-72.377 28.109-19.677 18.01-31.887 42.496-34.381 68.951a7.497 7.497 0 0 0 6.762 8.171zm128.173 42.846a7.18 7.18 0 0 1 7.159-6.75c3.955 0 7.172 3.217 7.172 7.171v.91c0 3.954-3.217 7.171-7.172 7.171h-7.66zm-64.514 8.502c-3.955 0-7.172-3.217-7.172-7.171v-.91c0-3.954 3.217-7.171 7.172-7.171a7.179 7.179 0 0 1 7.159 6.75l.501 8.502zm48.103 15-4.777 81.075H248.15l-4.777-81.075zm3.238 107.163c0 5.074-4.128 9.203-9.203 9.203h-11.604c-5.074 0-9.203-4.129-9.203-9.203v-11.088h30.009v11.088zM387.513 56.951a7.472 7.472 0 0 0 4.945-1.864l16.364-14.368a7.5 7.5 0 0 0-9.896-11.272l-16.364 14.368a7.5 7.5 0 0 0 4.951 13.136zM382.562 102.184l16.364 14.369a7.467 7.467 0 0 0 4.946 1.864 7.5 7.5 0 0 0 4.952-13.136L392.46 90.912a7.498 7.498 0 0 0-10.584.688 7.498 7.498 0 0 0 .686 10.584zM103.455 40.719l16.364 14.368a7.467 7.467 0 0 0 4.945 1.864 7.5 7.5 0 0 0 4.951-13.136l-16.364-14.368a7.498 7.498 0 0 0-10.584.688 7.5 7.5 0 0 0 .688 10.584zM108.406 118.417a7.476 7.476 0 0 0 4.946-1.864l16.364-14.369a7.5 7.5 0 0 0-9.897-11.272l-16.364 14.369a7.5 7.5 0 0 0 4.951 13.136zM189.782 260.154a7.5 7.5 0 0 0-7.5-7.5h-73.879c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h73.879a7.5 7.5 0 0 0 7.5-7.5zM205.13 290.805h-83.179c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h83.179c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5zM205.13 327.346h-83.179c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h83.179c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5zM205.13 363.887h-83.179c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h83.179c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5zM411.375 260.154a7.5 7.5 0 0 0-7.5-7.5h-73.879c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h73.879a7.5 7.5 0 0 0 7.5-7.5zM390.326 290.805h-83.179c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h83.179c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5zM390.326 327.346h-83.179c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h83.179c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5zM390.326 363.887h-83.179c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h83.179c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g>
                                </svg>
                                Thông tin chung
                            </div>
                            {{-- Mã GV --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="MaGV"><span class="text-red-600">*</span>Mã Giảng Viên:</label>
                                <input class="form-input" type="text" id="HoDem" name="MaGV" value="{{ $giangVien->MaGV }}" disabled>
                            </div>

                            {{-- Họ Đệm --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="HoDem"><span class="text-red-600">*</span>Họ đệm:</label>
                                <input class="form-input" type="text" id="HoDem" name="HoDem" value="{{ $giangVien->HoDem }}">
                            </div>
    
                            {{-- Tên --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="Ten"><span class="text-red-600">*</span>Tên:</label>
                                <input class="form-input" type="text" id="Ten" name="Ten" value="{{ $giangVien->Ten }}">
                            </div>
    
                            {{-- Tên Khác --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="TenKhac"><span class="text-red-600">*</span>Tên khác:</label>
                                <input class="form-input" type="text" id="TenKhac" name="TenKhac" value="{{ $giangVien->TenKhac }}">
                            </div>

                            {{-- Giới Tính --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="GioiTinh"><span class="text-red-600">*</span>Giới tính:</label>
                                <input class="form-input" type="text" id="GioiTinh" name="GioiTinh" value="{{ $giangVien->GioiTinh }}">
                            </div>

                            {{-- Dân Tộc --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="DanToc_ID"><span class="text-red-600">*</span>Dân tộc:</label>
                                <input class="form-input" type="text" id="DanToc_ID" name="DanToc_ID" value="{{ $giangVien->DanToc_ID }}">
                            </div>
                            
                            {{-- Ngày Sinh --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="NgaySinh"><span class="text-red-600">*</span>Ngày sinh:</label>
                                <input class="form-input" type="date" id="NgaySinh" name="NgaySinh" value="{{ $giangVien->NgaySinh }}">
                            </div>

                            {{-- CCCD --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="CCCD"><span class="text-red-600">*</span>CCCD:</label>
                                <input class="form-input" type="text" id="CCCD" name="CCCD" value="{{ $giangVien->CCCD }}">
                            </div>
    
                            {{-- Nơi Cấp CCCD --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="NoiCapCCCD"><span class="text-red-600">*</span>Nơi cấp CCCD:</label>
                                <input class="form-input" type="text" id="NoiCapCCCD" name="NoiCapCCCD" value="{{ $giangVien->NoiCapCCCD }}">
                            </div>
    
                            {{-- Ngày Cấp CCCD --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="NgayCapCCCD"><span class="text-red-600">*</span>Ngày cấp CCCD:</label>
                                <input class="form-input" type="date" id="NgayCapCCCD" name="NgayCapCCCD" value="{{ $giangVien->NgayCapCCCD }}">
                            </div>
    
                            {{-- Số Điện Thoại --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="SDT"><span class="text-red-600">*</span>Số điện thoại:</label>
                                <input class="form-input" type="tel" id="SDT" name="SDT" value="{{ $giangVien->SDT }}">
                            </div>

                            <!-- Email -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="Email"><span class="text-red-600">*</span>Email:</label>
                                <input class="form-input" type="email" id="Email" name="Email" value="{{ $giangVien->Email }}">
                            </div>

                            {{-- Nơi Sinh --}}
                            <div class="per_form-group p-2">
                                <label class="form-group__lable" for="NoiSinh"><span class="text-red-600">*</span>Nơi sinh:</label>
                                <input class="form-input" type="text" id="NoiSinh" name="NoiSinh" value="{{ $giangVien->NoiSinh }}">
                            </div>
    
                            {{-- Quê Quán --}}
                            <div class="per_form-group p-2">
                                <label class="form-group__lable" for="QueQuan"><span class="text-red-600">*</span>Quê quán:</label>
                                <input class="form-input" type="text" id="QueQuan" name="QueQuan" value="{{ $giangVien->QueQuan }}">
                            </div>
    
                            {{-- Địa Chỉ Thường trú --}}
                            <div class="per_form-group p-2">
                                <label class="form-group__lable" for="DiaChiThuongChu"><span class="text-red-600">*</span>Địa chỉ thường trú:</label>
                                <input class="form-input" type="text" id="DiaChiThuongChu" name="DiaChiThuongChu" value="{{ $giangVien->DiaChiThuongChu }}">
                            </div>
    
                            {{-- Chỗ Ở Hiện Nay --}}
                            <div class="per_form-group p-2">
                                <label class="form-group__lable" for="ChoOHienNay"><span class="text-red-600">*</span>Chỗ ở hiện nay:</label>
                                <input class="form-input" type="text" id="ChoOHienNay" name="ChoOHienNay" value="{{ $giangVien->ChoOHienNay }}">
                            </div>

                             <!-- SoBHXH -->
                             <div class="per_form-group p-1">
                                <label class="form-group__lable" for="SoBHXH"><span class="text-red-600">*</span>Số BHXH:</label>
                                <input class="form-input" type="text" id="SoBHXH" name="SoBHXH" value="{{ $giangVien->SoBHXH }}">
                            </div>

                            <!-- NgayTuyenDung -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="NgayTuyenDung"><span class="text-red-600">*</span>Ngày tuyển dụng:</label>
                                <input class="form-input" type="date" id="NgayTuyenDung" name="NgayTuyenDung" value="{{ $giangVien->NgayTuyenDung }}">
                            </div>

                            <!-- TenNganHang -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="TenNganHang"><span class="text-red-600">*</span>Tên ngân hàng:</label>
                                <input class="form-input" type="text" id="TenNganHang" name="TenNganHang" value="{{ $giangVien->TenNganHang }}">
                            </div>

                            <!-- SoTaiKhoanNganHang -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="SoTaiKhoanNganHang"><span class="text-red-600">*</span>Số tài khoản ngân hàng:</label>
                                <input class="form-input" type="text" id="SoTaiKhoanNganHang" name="SoTaiKhoanNganHang" value="{{ $giangVien->SoTaiKhoanNganHang }}">
                            </div>
                        </div>

                        {{-- Trình độ chuyên môn --}}
                        <div class="info-professional-level">
                            <div class="form__title p-4">
                                <svg style="display: flex;" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="29" height="29" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                    <path d="m506.62 141.44-248-86c-1.7-.59-3.54-.59-5.24 0l-248 86C2.16 142.56 0 145.59 0 149s2.16 6.44 5.38 7.56L80 182.44v103.83h.01c.21 15.31 18.81 27.59 55.3 36.5C167.64 330.65 210.5 335 256 335c38.05 0 74.25-3.04 104-8.65v36.03c-9.31 3.3-16 12.19-16 22.62a23.9 23.9 0 0 0 5.38 15.12c-5.75 5.13-9.38 12.59-9.38 20.88v28c0 4.42 3.58 8 8 8h40c4.42 0 8-3.58 8-8v-28c0-8.29-3.63-15.75-9.38-20.88 3.36-4.13 5.38-9.39 5.38-15.12 0-10.43-6.69-19.32-16-22.62v-39.45c.23-.06.46-.11.69-.16C413.39 313.81 432 301.44 432 286V182.44l74.62-25.88c3.22-1.12 5.38-4.15 5.38-7.56s-2.16-6.44-5.38-7.56zM380 441h-24v-20c0-6.62 5.38-12 12-12s12 5.38 12 12zm-20-56c0-4.41 3.59-8 8-8s8 3.59 8 8-3.59 8-8 8-8-3.59-8-8zm-104-66c-44.25 0-85.77-4.18-116.9-11.78C103.74 298.59 96 288.98 96 286v-98.02l157.38 54.57c.85.29 1.74.44 2.62.44s1.77-.15 2.62-.44L360 207.4v102.65c-29.28 5.8-65.61 8.95-104 8.95zm160-33c0 2.89-7.29 12.02-40 20.44V201.85l40-13.87zm-43.33-99.92c-.5-.36-1.04-.69-1.63-.93l-116-47.55c-4.09-1.68-8.76.28-10.44 4.37s.28 8.76 4.37 10.44l101.19 41.48L256 226.53 32.42 149 256 71.47 479.58 149z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g>
                                </svg>
                                Trình độ chuyên môn
                            </div>

                            <!-- TrinhDo -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="TrinhDo"><span class="text-red-600">*</span>Trình độ:</label>
                                <input class="form-input" type="text" id="TrinhDo" name="TrinhDo" value="{{ $giangVien->TrinhDo }}">
                            </div>
                            <!-- TrinhDoGiaoDucPhoThong -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="TrinhDoGiaoDucPhoThong"><span class="text-red-600">*</span>Trình độ giáo dục phổ thông:</label>
                                <input class="form-input" type="text" id="TrinhDoGiaoDucPhoThong" name="TrinhDoGiaoDucPhoThong" value="{{ $giangVien->TrinhDoGiaoDucPhoThong }}">
                            </div>
                            <!-- TrinhDoNgoaiNgu -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="TrinhDoNgoaiNgu"><span class="text-red-600">*</span>Trình độ ngoại ngữ:</label>
                                <input class="form-input" type="text" id="TrinhDoNgoaiNgu" name="TrinhDoNgoaiNgu" value="{{ $giangVien->TrinhDoNgoaiNgu }}">
                            </div>
                            <!-- ChungChiKyNangNghe -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="ChungChiKyNangNghe"><span class="text-red-600">*</span>Chứng chỉ kỹ năng nghề:</label>
                                <input class="form-input" type="text" id="ChungChiKyNangNghe" name="ChungChiKyNangNghe" value="{{ $giangVien->ChungChiKyNangNghe }}">
                            </div>
                            <!-- ChuyenNganhHoc -->
                            <div class="per_form-group p-2">
                                <label class="form-group__lable" for="ChuyenNganhHoc"><span class="text-red-600">*</span>Chuyên ngành học:</label>
                                <input class="form-input" type="text" id="ChuyenNganhHoc" name="ChuyenNganhHoc" value="{{ $giangVien->ChuyenNganhHoc }}">
                            </div>
                            <!-- CoSoDaoTao -->
                            <div class="per_form-group p-2">
                                <label class="form-group__lable" for="CoSoDaoTao"><span class="text-red-600">*</span>Cơ sở đào tạo:</label>
                                <input class="form-input" type="text" id="CoSoDaoTao" name="CoSoDaoTao" value="{{ $giangVien->CoSoDaoTao }}">
                            </div>
                            <!-- ChungChiNghiepVuSuPham -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="ChungChiNghiepVuSuPham"><span class="text-red-600">*</span>Chứng chỉ nghiệp vụ sư phạm:</label>
                                <input class="form-input" type="text" id="ChungChiNghiepVuSuPham" name="ChungChiNghiepVuSuPham" value="{{ $giangVien->ChungChiNghiepVuSuPham }}">
                            </div>
                        </div>

                        {{-- Tình trạng sức khỏe --}}
                        <div class="info-health-condition">
                            <div class="form__title p-4">
                                <span style="display: flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="29" height="29" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                        <path d="M480.787 26.509h-96.481a7.5 7.5 0 0 0 0 15h96.481c8.94 0 16.213 7.273 16.213 16.213v284.974H15V57.722c0-8.94 7.273-16.213 16.213-16.213h318.092a7.5 7.5 0 0 0 0-15H31.213C14.002 26.509 0 40.511 0 57.722v308.761c0 17.211 14.002 31.213 31.213 31.213h71.801a7.5 7.5 0 0 0 0-15H31.213c-8.94 0-16.213-7.273-16.213-16.213v-8.787h482v8.787c0 8.94-7.273 16.213-16.213 16.213H137.684a7.5 7.5 0 0 0 0 15h47.204l-7.405 42.795h-13.686c-12.407 0-22.5 10.093-22.5 22.5s10.093 22.5 22.5 22.5h184.406c12.407 0 22.5-10.093 22.5-22.5s-10.093-22.5-22.5-22.5h-13.686l-7.405-42.795h153.674c17.211 0 31.213-14.002 31.213-31.213V57.722c.001-17.211-14.001-31.213-31.212-31.213zM319.294 440.491h-20.418a7.5 7.5 0 0 0 0 15h49.327c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5H163.797c-4.136 0-7.5-3.364-7.5-7.5s3.364-7.5 7.5-7.5h100.067a7.5 7.5 0 0 0 0-15h-71.158l7.405-42.795H311.89z" fill="#000000" opacity="1" data-original="#000000" class=""></path><path d="M405.719 216.277a7.501 7.501 0 0 0-6.685 4.099l-35.394 69.565-29.868-58.705a7.501 7.501 0 0 0-13.37 0l-16.191 31.823H278.36a7.5 7.5 0 0 0 0 15h30.45a7.501 7.501 0 0 0 6.685-4.099l11.592-22.783 29.868 58.705a7.501 7.501 0 0 0 13.37 0l35.394-69.565 17.117 33.644a7.501 7.501 0 0 0 6.685 4.099h30.45a7.5 7.5 0 0 0 0-15H434.12l-21.716-42.683a7.5 7.5 0 0 0-6.685-4.1zM278.363 194.059h38.919a7.5 7.5 0 0 0 7.5-7.5v-78.954a7.5 7.5 0 0 0-7.5-7.5h-38.919a7.5 7.5 0 0 0-7.5 7.5v78.954a7.5 7.5 0 0 0 7.5 7.5zm7.5-78.954h23.919v63.954h-23.919zM388.891 121.56h-38.919a7.5 7.5 0 0 0-7.5 7.5v57.499a7.5 7.5 0 0 0 7.5 7.5h38.919a7.5 7.5 0 0 0 7.5-7.5V129.06a7.5 7.5 0 0 0-7.5-7.5zm-7.5 57.499h-23.919V136.56h23.919zM459.971 194.059a7.5 7.5 0 0 0 7.5-7.5V87.81a7.5 7.5 0 0 0-7.5-7.5h-38.919a7.5 7.5 0 0 0-7.5 7.5v98.749a7.5 7.5 0 0 0 7.5 7.5zM428.552 95.31h23.919v83.749h-23.919zM221.898 165.152h-170a7.5 7.5 0 0 0 0 15h170a7.5 7.5 0 0 0 0-15zM51.898 219.993H82.32a7.5 7.5 0 0 0 0-15H51.898a7.5 7.5 0 0 0 0 15zM221.898 204.993H116.685a7.5 7.5 0 0 0 0 15h105.213a7.5 7.5 0 0 0 0-15zM221.898 80.31h-170a7.5 7.5 0 0 0 0 15h170a7.5 7.5 0 0 0 0-15zM51.898 135.152H157.32a7.5 7.5 0 0 0 0-15H51.898a7.5 7.5 0 0 0 0 15zM221.898 120.152h-30.213a7.5 7.5 0 0 0 0 15h30.213a7.5 7.5 0 0 0 0-15zM229.398 251.851a7.5 7.5 0 0 0-7.5-7.5h-170a7.5 7.5 0 0 0 0 15h170a7.5 7.5 0 0 0 7.5-7.5zM51.898 283.981a7.5 7.5 0 0 0 0 15h80a7.5 7.5 0 0 0 0-15z" fill="#000000" opacity="1" data-original="#000000" class="">
                                        </path></g>
                                    </svg>
                                </span>
                                Tình trạng sức khỏe
                            </div>
                            <!-- TinhTrangSucKhoe -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="TinhTrangSucKhoe"><span class="text-red-600">*</span>Tình trạng sức khỏe:</label>
                                <input class="form-input" type="text" id="TinhTrangSucKhoe" name="TinhTrangSucKhoe" value="{{ $giangVien->TinhTrangSucKhoe }}">
                            </div>
                            <!-- ChieuCao -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="ChieuCao"><span class="text-red-600">*</span>Chiều cao (cm):</label>
                                <input class="form-input" type="text" id="ChieuCao" name="ChieuCao" value="{{ $giangVien->ChieuCao }}">
                            </div>
                            <!-- CanNang -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="CanNang"><span class="text-red-600">*</span>Cân nặng (kg):</label>
                                <input class="form-input" type="text" id="CanNang" name="CanNang" value="{{ $giangVien->CanNang }}">
                            </div>
                            <!-- NhomMau -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="NhomMau"><span class="text-red-600">*</span>Nhóm máu:</label>
                                <input class="form-input" type="text" id="NhomMau" name="NhomMau" value="{{ $giangVien->NhomMau }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection