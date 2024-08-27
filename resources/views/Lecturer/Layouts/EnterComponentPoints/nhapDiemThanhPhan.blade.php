@extends('Lecturer.DefaultLayout.main')

@section('content')
    <div class="grid">
        <div class="container" style="margin: 0 auto;">
            <div class="row">
                <div class="col l-12">
                    <h2 class="title">NHẬP ĐIỂM THÀNH PHẦN</h2>
                    <div style="text-align: center">
                        @if ($getComponentPoints)
                            <label class="title-label">Tên môn: {{ $getComponentPoints['diemThanhPhan']->TenMon }}</label>
                            <label class="title-label">Lớp: {{ $getComponentPoints['diemThanhPhan']->TenLop }}</label>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 40px 0;">
                <div class="col l-12">

                    <form action="{{ route('save.update') }}" method="POST">
                        @csrf
                        <table class="table">
                            <thead class="table_th">
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
                                    <td style="vertical-align: middle; padding: 4px 10px; width: 8%">TX2</td>
                                    <td style="vertical-align: middle; padding: 4px 10px; width: 8%">ĐK1</td>
                                    <td style="vertical-align: middle; padding: 4px 10px; width: 8%">ĐK2</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getComponentPoints['dataDiemThanhPhan'] as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->MaSV }}</td>
                                        <td>{{ $item->HoDem }} {{ $item->Ten }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->NgayThangNamSinh)->format('d/m/Y') }}</td>
                                        <td>
                                            {{-- Đoạn mã này tạo ra một input ẩn chứa mã số sinh viên (MaSV) và gửi nó cùng với các dữ liệu khác khi form được submit. Điều này giúp biết được dữ liệu điểm số nào thuộc về sinh viên nào mà không cần phải hiển thị MaSV ra giao diện người dùng. --}}
                                            <input type="hidden" name="diem[{{ $index }}][MaSV]"
                                                value="{{ $item->MaSV }}">

                                            <input type="hidden" name="diem[{{ $index }}][MaMonHoc]"
                                                value="{{ $item->MaMonHoc }}">
                                            <input class="input" type="number" step="0.01" placeholder="Nhập DiemTX1"
                                                name="diem[{{ $index }}][DiemTX1]" value="{{ $item->DiemTX1 }}"
                                                onchange="calculateDiemTB({{ $index }})"
                                                id="DiemTX1_{{ $index }}">
                                        </td>

                                        <td>
                                            <input class="input" type="number" step="0.01" placeholder="Nhập DiemDK1"
                                                name="diem[{{ $index }}][DiemDK1]" value="{{ $item->DiemDK1 }}"
                                                onchange="calculateDiemTB({{ $index }})"
                                                id="DiemDK1_{{ $index }}">
                                        </td>

                                        <td>
                                            <input class="input" type="number" step="0.01" placeholder="Nhập DiemTX2"
                                                name="diem[{{ $index }}][DiemTX2]" value="{{ $item->DiemTX2 }}"
                                                onchange="calculateDiemTB({{ $index }})"
                                                id="DiemTX2_{{ $index }}">
                                        </td>

                                        <td>
                                            <input class="input" type="number" step="0.01" placeholder="Nhập DiemDK2"
                                                name="diem[{{ $index }}][DiemDK2]" value="{{ $item->DiemDK2 }}"
                                                onchange="calculateDiemTB({{ $index }})"
                                                id="DiemDK2_{{ $index }}">
                                        </td>

                                        <td>
                                            <input class="input" type="number" step="0.01" placeholder="Nhập DiemThi"
                                                name="diem[{{ $index }}][DiemThi]" value="{{ $item->DiemThi }}"
                                                onchange="calculateDiemTB({{ $index }})"
                                                id="DiemThi_{{ $index }}">
                                        </td>

                                        <td>
                                            <input class="input" type="number" step="0.01" placeholder="Nhập DiemTB"
                                                name="diem[{{ $index }}][DiemTB]" value="{{ $item->DiemTB }}"
                                                readonly id="DiemTB_{{ $index }}">
                                        </td>

                                        <td>
                                            <input class="input" type="text" placeholder="Ghi chú"
                                                name="diem[{{ $index }}][GhiChu]" value="{{ $item->GhiChu }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-end content-center" style="margin-top:20px;">
                            <button class="btn btn--primary table__btn">Lưu Lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function calculateDiemTB(index) {
        // lấy các giá trị điểm thành phần từ input
        // parseFloat() là một hàm trong JavaScript được sử dụng để phân tích một chuỗi và trả về một số thập phân
        let DiemTX1 = parseFloat(document.getElementById('DiemTX1_' + index).value) || 0;
        let DiemDK1 = parseFloat(document.getElementById('DiemDK1_' + index).value) || 0;
        let DiemTX2 = parseFloat(document.getElementById('DiemTX2_' + index).value) || 0;
        let DiemDK2 = parseFloat(document.getElementById('DiemDK2_' + index).value) || 0;
        let DiemThi = parseFloat(document.getElementById('DiemThi_' + index).value) || 0;

        // cong thuc tinh diem TB
        let DiemTB = ((((DiemTX1 + DiemDK1 + DiemTX2 + DiemDK2) * 2) / 3) * 0.4) + (DiemThi * 0.6);

        // hiển thị điểm trung bình trong input DiemTB
        document.getElementById('DiemTB_' + index).value = DiemTB.toFixed(2);
    }
</script>
