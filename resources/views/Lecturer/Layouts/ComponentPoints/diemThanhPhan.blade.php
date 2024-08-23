@extends('Lecturer.DefaultLayout.main')

@section('content')
    <div class="grid container">
        <div class="row">
            <div class="col l-12 flex flex-col content-center">
                <div class="content__title">
                    <h3>Nhập điểm thành phần</h3>
                </div>
                <div class="search-container">
                    <div class="search-option">
                        <label class="option-name search__option-name" for="hocky">Học kỳ:</label>
                        <select name="search__select-option" id="search__select-option"
                            class="select-option search__select-option">
                            <option value="1">-- Chọn học kỳ --</option>
                            <option value="2">Học kỳ 1</option>
                            <option value="3">Học kỳ 2</option>
                        </select>
                    </div>

                    <div class="search-option">
                        <label class="option-name search__option-name" for="search__select-option">Môn học:</label>
                        <select name="search__select-option" id="search__select-option"
                            class="select-option search__select-option">
                            <option value="1">-- Chọn môn học --</option>
                            <option value="1">An toàn và bảo mật thông tin</option>
                            <option value="2">Hệ quản trị cơ sở dữ liệu</option>
                            <option value="3">Thiết kế website</option>
                            <option value="4">Phân tích và thiết kế hệ thống</option>
                        </select>
                    </div>
                    <div class="search-option">
                        <label class="option-name search__option-name" for="search__select-option">Lớp học phần:</label>
                        <select name="search__select-option" id="search__select-option"
                            class="select-option search__select-option">
                            <option value="1">-- Chọn lớp học phần --</option>
                            <option value="2">1621CNT01</option>
                            <option value="3">1621CNT02</option>
                            <option value="4">1621CNT03</option>
                            <option value="5">1621CNT04</option>
                        </select>
                    </div>
                    <div class="search__btn">
                        <button type="submit" class="btn btn--primary btn--search">Tìm kiếm</button>
                    </div>
                </div>
                <!-- table  -->
                <div class="table-container animate__animated animate__fadeInUp">
                    <table class="table table--primary">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên môn học</th>
                                <th>Tên lớp học phần</th>
                                <th>Số TC</th>
                                <th>Số tiết HP</th>
                                <th>Sĩ số</th>
                                <th>Thời gian nhập điểm</th>
                                <th colspan="3">#</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr class="tr__title">
                                <td>1</td>
                                <td>An toàn bảo mật thông tin</td>
                                <td>1621CNT01</td>
                                <td>3</td>
                                <td>60</td>
                                <td>40</td>
                                <td>01/08/2024 - 15/08/2024</td>
                                <td><a href="./danhsachdiemdanh.html" class="btn btn--secondary table__btn ">Nhập điểm</a>
                                </td>
                                <td><button class="btn btn--info table__btn">Import Điểm</button></td>
                                <td><button class="btn btn--success table__btn">Export Điểm</button></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
