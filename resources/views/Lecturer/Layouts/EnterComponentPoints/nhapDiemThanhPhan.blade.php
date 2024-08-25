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

                <!-- table  -->
                <div class="table-container animate__animated animate__fadeInUp">
                    <table class="table table--primary">
                        <thead>
                            <tr>
                                <th>STT</th>
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
                                    <td>{{ $item->TenMon }}</td>
                                    <td>{{ $item->HoDem }} {{ $item->Ten }}</td>
                                    <td>
                                        <input
                                            style="padding: 6px 10px;
                                            width: 100%;
                                            outline: none;
                                            border: none;"
                                            type="text" placeholder="Nhập DiemTX1">
                                    </td>

                                    <td>
                                        <input
                                            style="padding: 6px 10px;
                                            width: 100%;
                                            outline: none;
                                            border: none;"
                                            type="text" placeholder="Nhập DiemDK1">
                                    </td>

                                    <td>
                                        <input
                                            style="padding: 6px 10px;
                                            width: 100%;
                                            outline: none;
                                            border: none;"
                                            type="text" placeholder="Nhập DiemTX2">
                                    </td>

                                    <td>
                                        <input
                                            style="padding: 6px 10px;
                                            width: 100%;
                                            outline: none;
                                            border: none;"
                                            type="text" placeholder="Nhập DiemDK2">
                                    </td>

                                    <td>
                                        <input
                                            style="padding: 6px 10px;
                                            width: 100%;
                                            outline: none;
                                            border: none;"
                                            type="text" placeholder="Nhập DiemTB">
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
            </div>
        </div>
    </div>
@endsection
