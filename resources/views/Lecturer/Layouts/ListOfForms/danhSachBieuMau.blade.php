@extends('Lecturer.DefaultLayout.main')

@section('content')
    <div class="grid container" id="scrollContainer">
        <div class="row">
            <div class="col l-12">
                <div class="animate__animated animate__fadeInUp flex justify-center" id="form-list">
                    <table class="table table--primary">
                        <thead class="table__heading heading--primary">
                            <tr>
                                <th>Tên biểu mẫu</th>
                                <th>Link đính kèm</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table__row">
                                <td>HDSD_vai trò của giảng viên</td>
                                <td><a href="#" class="link link--black form--link">[Link]</a></td>
                                <td class="flex justify-center content-center">
                                    <button class="btn btn--primary form-table__btn">Download</button>
                                </td>
                            </tr>
                            <tr class="table__row">
                                <td>Mẫu giáo án môn lý thuyết</td>
                                <td><a href="#" class="link link--black form--link">[Link]</a></td>
                                <td class="flex justify-center content-center">
                                    <button class="btn btn--primary form-table__btn">Download</button>
                                </td>
                            </tr>
                            <tr class="table__row">
                                <td>Mẫu giáo án môn thực hành</td>
                                <td><a href="#" class="link link--black form--link">[Link]</a></td>
                                <td class="flex justify-center content-center">
                                    <button class="btn btn--primary form-table__btn">Download</button>
                                </td>
                            </tr>
                            <tr class="table__row">
                                <td>Mẫu giáo môn tích hợp LT+TH</td>
                                <td><a href="#" class="link link--black form--link">[Link]</a></td>
                                <td class="flex justify-center content-center">
                                    <button class="btn btn--primary form-table__btn">Download</button>
                                </td>
                            </tr>
                            <tr class="table__row">
                                <td>Bìa sổ lên lớp + Hướng dẫn sử dụng Sổ lên lớp</td>
                                <td><a href="#" class="link link--black form--link">[Link]</a></td>
                                <td class="flex justify-center content-center">
                                    <button class="btn btn--primary form-table__btn">Download</button>
                                </td>
                            </tr>
                            <tr class="table__row">
                                <td>Nội dung sổ lên lớp</td>
                                <td><a href="#" class="link link--black form--link">[Link]</a></td>
                                <td class="flex justify-center content-center">
                                    <button class="btn btn--primary form-table__btn">Download</button>
                                </td>
                            </tr>
                            <tr class="table__row">
                                <td>Biểu mẫu lịch giảng dạy</td>
                                <td><a href="#" class="link link--black form--link">[Link]</a></td>
                                <td class="flex justify-center content-center">
                                    <button class="btn btn--primary form-table__btn">Download</button>
                                </td>
                            </tr>
                            <tr class="table__row">
                                <td>Hướng dẫn nhập điểm</td>
                                <td><a href="#" class="link link--black form--link">[Link]</a></td>
                                <td class="flex justify-center content-center">
                                    <button class="btn btn--primary form-table__btn">Download</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
