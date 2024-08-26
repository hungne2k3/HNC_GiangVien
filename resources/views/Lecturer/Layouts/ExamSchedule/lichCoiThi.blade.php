@extends('Lecturer.DefaultLayout.main')

@section('content')
    <form>
        <div class="content__lichcoithi">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-sm-3 col-md-6 col-lg-3 pe-0 ps-0 mb-3 pe-sm-2">
                        <label for="hoc__ky" class="content__name">Học kỳ:</label>
                        <select class="form-select mt-1 hocky" aria-label="Default select example" id="hoc__ky">
                            <option>--Chọn học kỳ--</option>
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="col-sm-3 col-md-6 col-lg-3 pe-0 mb-3 pe-lg-2 ps-md-2 ps-0 pe-sm-2">
                        <label for="nam__hoc" class="content__name">Năm học:</label>
                        <select class="form-select mt-1 namhoc" style="color: #555" aria-label="Default select example"
                            id="nam__hoc">
                            <option value="">--Chọn năm học--</option>
                        </select>
                    </div>

                    <div class="col-sm-3 col-md-6 col-lg-3 pe-0 mb-3 ps-md-0 ps-0 btn__timkiem"
                        style="margin-top: 28px; color: #555">
                        <button type="submit" class="btn btn-primary btn-search ">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div style="padding-left: 10px; padding-right: 10px">
        <div class="container mt-3 ps-0" id="table__lichcoithi" style="display: none">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" style="border: 1px solid #000">
                    <thead class="text-center" style="border-bottom: 1px solid #000">
                        <tr>
                            <th class="bgc__th">Tên học phần</th>
                            <th class="bgc__th">Đợt thi</th>
                            <th class="bgc__th">Ngày thi</th>
                            <th class="bgc__th">Giờ thi</th>
                            <th class="bgc__th">Phòng thi</th>
                            <th class="bgc__th">Số SV</th>
                            <th class="bgc__th">Cán bộ coi thi 1</th>
                            <th class="bgc__th">Cán bộ coi thi 2</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr class="tr__title">
                            <td>Hệ quản trị cơ sở dữ liệu</td>
                            <td>Đợt 1</td>
                            <td>18-07-2024</td>
                            <td>7:30</td>
                            <td>101</td>
                            <td>50</td>
                            <td>Nguyễn Văn A</td>
                            <td>nguyena@example.com</td>
                        </tr>
                        <tr class="tr__title">
                            <td>Quản trị mạng</td>
                            <td>Đợt 2</td>
                            <td>15-07-2024</td>
                            <td>9:30</td>
                            <td>86</td>
                            <td>50</td>
                            <td>Trần Thị B</td>
                            <td>btran@example.com</td>
                        </tr>
                        <tr class="tr__title">
                            <td>Lập trình hướng đối tượng</td>
                            <td>Đợt 3</td>
                            <td>12-07-2024</td>
                            <td>13:30</td>
                            <td>68</td>
                            <td>50</td>
                            <td>Pham Thi C</td>
                            <td>cphamthi@example.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
