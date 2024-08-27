@extends('Lecturer.DefaultLayout.main')

@section('content')
    <div class="grid">
        <div class="container" style="margin: 0 auto;">
            <div class="row">
                <div class="col l-12">
                    <h2 class="title">XEM ĐIỂM THÀNH PHẦN</h2>
                    <div style="text-align: center; margin-top: -22px;">
                        @if ($getComponentPoints)
                            <label class="title-label">Tên môn: {{ $getComponentPoints['diemThanhPhan']->TenMon }}</label>
                            <label class="title-label">- Lớp: {{ $getComponentPoints['diemThanhPhan']->TenLop }}</label>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 40px 0;">
                <div class="col l-12">
                    <table class="table">
                        <thead class="table_th" style="font-weight: 600">
                            <tr>
                                <td rowspan="2">STT</td>
                                <td rowspan="2">Mã sinh viên</td>
                                <td rowspan="2">Họ và tên</td>
                                <td rowspan="2">Ngày sinh</td>
                                <td colspan="4">Điểm kiểm tra, điểm đánh giá thường xuyên</td>
                                <td rowspan="2" style="width: 8%">Điểm thi</td>
                                <td rowspan="2" style="width: 10%">Điểm TBCHP</td>
                                <td rowspan="2" style="width: 20%">Ghi chú</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle; padding: 4px 10px; width: 8%">TX1</td>
                                <td style="vertical-align: middle; padding: 4px 10px; width: 8%">ĐK1</td>
                                <td style="vertical-align: middle; padding: 4px 10px; width: 8%">TX2</td>
                                <td style="vertical-align: middle; padding: 4px 10px; width: 8%">ĐK2</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getComponentPoints['dataDiemThanhPhan'] as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->MaSV }}</td>
                                    <td>{{ $item->HoDem }} {{ $item->Ten }}</td>
                                    <td>{{ $item->NgayThangNamSinh }}</td>
                                    <td>
                                        {{ $item->DiemTX1 }}
                                    </td>

                                    <td>
                                        {{ $item->DiemDK1 }}
                                    </td>

                                    <td>
                                        {{ $item->DiemTX2 }}
                                    </td>

                                    <td>
                                        {{ $item->DiemDK2 }}
                                    </td>

                                    <td>
                                        {{ $item->DiemThi }}
                                    </td>

                                    <td>
                                        {{ $item->DiemTB }}
                                    </td>

                                    <td>
                                        {{ $item->GhiChu }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
