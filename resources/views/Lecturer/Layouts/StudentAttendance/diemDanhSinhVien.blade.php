@extends('Lecturer.DefaultLayout.main')

@section('content')
    <div class="grid container">
        <div class="row">
            <div class="col l-12 flex flex-col content-center">
                <div class="content__title">
                    <h3>Danh sách môn học</h3>
                </div>
                <form action="{{ url('/diem-danh-sinh-vien') }}" method="POST">
                    <div class="search-container">
                        @csrf
                        <div class="search-option">
                            <label class="option-name search__option-name" for="hocky">Học kỳ:</label>
                            <select name="hocky" id="hocky" class="select-option search__select-option">
                                <option value="">-- Chọn học kỳ --</option>
                                @foreach ($getDataInfo['kyHocs'] as $kyHoc)
                                    <option
                                        value="{{ $kyHoc->id }}"{{ request('hocky') === $kyHoc->TenKy ? 'selected' : '' }}>
                                        {{ $kyHoc->TenKy }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="search-option">
                            <label class="option-name search__option-name" for="monhoc">Môn học:</label>
                            <select name="monhoc" id="monhoc" class="select-option search__select-option">
                                <option value="">-- Chọn môn học --</option>
                                @foreach ($getDataInfo['monHocs'] as $monHoc)
                                    <option value="{{ $monHoc->MaMonHoc }}"
                                        {{ request('monhoc') === $monHoc->MaMonHoc ? 'selected' : '' }}>
                                        {{ $monHoc->TenMon }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="search-option">
                            <label class="option-name search__option-name" for="lop">Lớp học phần:</label>
                            <select name="lop" id="lop" class="select-option search__select-option">
                                <option value="">-- Chọn lớp học phần --</option>
                                @foreach ($getDataInfo['giangVien'] as $lop)
                                    <option value="{{ $lop->MaLop }}"
                                        {{ request('lop') == $lop->MaLop ? 'selected' : '' }}>{{ $lop->TenLop }}</option>
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
                                <th>Giảng viên</th>
                                <th>Tổng số tiết</th>
                                <th>Sĩ số</th>
                                <th>Số HT/TC</th>
                                <th colspan="3">#</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($getDataInfo['dataInfo'] as $index => $item)
                                <tr class="tr__title">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->TenMon }}</td>
                                    <td>{{ $item->TenLop }}</td>
                                    <td>{{ $item->HoDem }} {{ $item->Ten }}</td>
                                    <td>{{ $item->SoTiet }}</td>
                                    <td>50</td>
                                    <td>{{ $item->SoTin }}</td>
                                    <td><a href="/danh-sach-diem-danh/{{ $item->id }}"
                                            class="btn btn--secondary table__btn ">ĐDSV</a></td>
                                    <td><button class="btn btn--info table__btn">Import ĐD</button></td>
                                    <td><a href="{{ route('export.rollcall', ['monHocKyId' => $item->id]) }}"
                                            class="btn btn--success table__btn">Export ĐD</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
