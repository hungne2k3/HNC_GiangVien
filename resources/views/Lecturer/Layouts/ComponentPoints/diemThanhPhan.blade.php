@extends('Lecturer.DefaultLayout.main')

@section('content')
    <div class="grid container">
        <div class="row">
            <div class="col l-12 flex flex-col content-center">
                <div class="content__title">
                    <h3>Điểm thành phần</h3>
                </div>

                <form action="{{ url('/diem-thanh-phan') }}" method="POST">
                    @csrf

                    <div class="search-container">
                        <div class="search-option">
                            <label class="option-name search__option-name" for="hocKy">Học kỳ:</label>
                            <select name="hocKy" id="hocKy" class="select-option search__select-option">
                                <option value="">-- Chọn học kỳ --</option>
                                @foreach ($getInfo['kyHoc'] as $kyHoc)
                                    <option
                                        value="{{ $kyHoc->id }}"{{ request('hocKy') === $kyHoc->TenKy ? 'selected' : '' }}>
                                        {{ $kyHoc->TenKy }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="search-option">
                            <label class="option-name search__option-name" for="monHoc">Môn học:</label>
                            <select name="monHoc" id="monHoc" class="select-option search__select-option">
                                <option value="">-- Chọn môn học --</option>
                                @foreach ($getInfo['monHoc'] as $monHoc)
                                    <option value="{{ $monHoc->MaMonHoc }}"
                                        {{ request('monHoc') === $monHoc->MaMonHoc ? 'selected' : '' }}>
                                        {{ $monHoc->TenMon }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="search-option">
                            <label class="option-name search__option-name" for="lop">Lớp học phần:</label>
                            <select name="lop" id="lop" class="select-option search__select-option">
                                <option value="">-- Chọn lớp học phần --</option>
                                @foreach ($getInfo['gv'] as $lop)
                                    <option value="{{ $lop->MaLop }}"
                                        {{ request('lop') == $lop->MaLop ? 'selected' : '' }}>
                                        {{ $lop->TenLop }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="search__btn">
                            <button type="submit" class="btn btn--primary btn--search">Tìm kiếm</button>
                        </div>
                    </div>
                </form>

                <!-- table  -->
                <div class="table-container animate__animated animate__fadeInUp">
                    <table class="table table--primary">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên môn học</th>
                                <th>Tên lớp</th>
                                <th>Số TC</th>
                                <th>Số tiết HP</th>
                                <th>Sĩ số</th>
                                <th>Thời gian nhập điểm</th>
                                <th colspan="3">#</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($getInfo['dataInfoQuery'] as $index => $item)
                                <tr class="tr__title">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->TenMon }}</td>
                                    <td>{{ $item->TenLop }}</td>
                                    <td>{{ $item->SoTin }}</td>
                                    <td>{{ $item->SoTiet }}</td>
                                    <td>40</td>
                                    <td>01/08/2024 - 15/08/2024</td>
                                    <td><a href="./danhsachdiemdanh.html" class="btn btn--secondary table__btn ">Nhập
                                            điểm</a>
                                    </td>
                                    <td><button class="btn btn--info table__btn">Import Điểm</button></td>
                                    <td><button class="btn btn--success table__btn">Export Điểm</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
