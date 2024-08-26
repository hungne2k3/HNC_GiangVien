@extends('Lecturer.DefaultLayout.main')

@section('content')
    <div class="grid container">
        <div class="row">
            <div class="col l-12 flex flex-col content-center">
                <div class="content__title">
                    <h3>Nhập điểm thành phần</h3>

                    <div class="content__desc">
                        @if ($getComponentPoints)
                            <label>Tên môn: {{ $getComponentPoints['diemThanhPhan']->TenMon }}</label>
                            <label>Lớp: {{ $getComponentPoints['diemThanhPhan']->TenLop }}</label>
                        @endif
                    </div>
                </div>

                <form action="{{ route('save.update') }}" method="POST">
                    @csrf
                    <!-- table  -->
                    <div class="table-container animate__animated animate__fadeInUp">
                        <table class="table table--primary">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>MaSV</th>
                                    <th>Tên môn học</th>
                                    <th>Họ tên</th>
                                    <th style="width: 10%">DiemTX1</th>
                                    <th style="width: 10%">DiemDK1</th>
                                    <th style="width: 10%">DiemTX2</th>
                                    <th style="width: 10%">DiemDK2</th>
                                    <th style="width: 10%">DiemTB</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($getComponentPoints['dataDiemThanhPhan'] as $index => $item)
                                    <tr class="tr__title">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->MaSV }}</td>
                                        <td>{{ $item->TenMon }}</td>
                                        <td>{{ $item->HoDem }} {{ $item->Ten }}</td>

                                        <td>
                                            {{-- Đoạn mã này tạo ra một input ẩn chứa mã số sinh viên (MaSV) và gửi nó cùng với các dữ liệu khác khi form được submit. Điều này giúp biết được dữ liệu điểm số nào thuộc về sinh viên nào mà không cần phải hiển thị MaSV ra giao diện người dùng. --}}
                                            <input type="hidden" name="diem[{{ $index }}][MaSV]"
                                                value="{{ $item->MaSV }}">

                                            <input type="hidden" name="diem[{{ $index }}][MaMonHoc]"
                                                value="{{ $item->MaMonHoc }}">
                                            <input
                                                style="padding: 6px 10px;
                                                width: 100%;
                                                outline: none;
                                                border: none;"
                                                type="text" placeholder="Nhập DiemTX1"
                                                name="diem[{{ $index }}][DiemTX1]" value="{{ $item->DiemTX1 }}">
                                        </td>

                                        <td>
                                            <input
                                                style="padding: 6px 10px;
                                                width: 100%;
                                                outline: none;
                                                border: none;"
                                                type="text" placeholder="Nhập DiemDK1"
                                                name="diem[{{ $index }}][DiemDK1]" value="{{ $item->DiemDK1 }}">
                                        </td>

                                        <td>
                                            <input
                                                style="padding: 6px 10px;
                                                width: 100%;
                                                outline: none;
                                                border: none;"
                                                type="text" placeholder="Nhập DiemTX2"
                                                name="diem[{{ $index }}][DiemTX2]" value="{{ $item->DiemTX2 }}">
                                        </td>

                                        <td>
                                            <input
                                                style="padding: 6px 10px;
                                                width: 100%;
                                                outline: none;
                                                border: none;"
                                                type="text" placeholder="Nhập DiemDK2"
                                                name="diem[{{ $index }}][DiemDK2]" value="{{ $item->DiemDK2 }}">
                                        </td>

                                        <td>
                                            <input
                                                style="padding: 6px 10px;
                                                width: 100%;
                                                outline: none;
                                                border: none;"
                                                type="text" placeholder="Nhập DiemTB"
                                                name="diem[{{ $index }}][DiemTB]" value="{{ $item->DiemTB }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="btn__action" style="margin-top: 20px;">
                            <div class="grid container">
                                <div class="row">
                                    <div class="col flex justify-end content-center" style="width:100%">
                                        <button type="submit" class="btn btn--primary" style="margin-right: 16px;">Lưu
                                            điểm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
