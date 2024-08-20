@extends('Lecturer.DefaultLayout.main')

@section('content')
    <div class="grid container">
        <div class="row">
            <div class="col l-12 flex flex-col content-center" style="position: relative;">
                <div class="content__title">
                    <h3>Điểm danh sinh viên</h3>
                    <div class="content__desc">
                        @foreach ($danhSachDiemDanh['danhSachDiemDanh'] as $diemDanh)
                            <label>Tên môn: {{ $diemDanh->TenMon }}</label>
                        @endforeach

                        @foreach ($danhSachDiemDanh['danhSachDiemDanh'] as $lop)
                            <label>Lớp: {{ $lop->TenLop }}</label>
                        @endforeach
                    </div>
                </div>
                <hr class="seperator">
                <!-- Date-picker -->
                <div class="flex content-center justify-end" style="gap: 10px;">
                    <label for="dateofbirth"
                        style="font-size: 14px; font-size: 14px;
                                font-weight: 600;
                                color: #0C8281;">
                        Ngày điểm
                        danh:
                    </label>
                    <input type="date" id="myID" name="selected_date" class="flatpick input-date ct-shape"
                        value="" placeholder="{{ $currentDate->format('Y-m-d') }}" readonly
                        style="padding: 10px;
                        border-radius: 4px;
                        outline: none;
                        border: 1px solid #ccc;">
                </div>

                <form action="{{ route('save.rollcall') }}" method="POST">
                    @csrf
                    <!-- table  -->
                    <div class="table-container animate__animated animate__fadeInUp table-list">
                        <table class="table" style="font-size: 14px; position: relative;">
                            <thead>
                                <tr>
                                    <th style="width: 4%">STT</th>
                                    <th>Mã sinh viên</th>
                                    <th style="width: 12%">Họ và tên</th>
                                    <th style="width: 14%">Môn học/Module</th>
                                    <th style="width: ">Tên lớp</th>
                                    <th style="width: ">Ngày điểm danh</th>
                                    <th style="width: 3%">Ca</th>
                                    <th style="width: 7%">Tiết</th>
                                    <th>Số tiết đi muộn</th>
                                    <th colspan="2">Ghi chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($danhSachDiemDanh['danhSachDiemDanh'] as $index => $danhsach)
                                    <tr class="tr__title">
                                        <td>{{ $index }}</td>
                                        <td>{{ $danhsach->MaSV }}</td>
                                        <td>{{ $danhsach->HoDem }} {{ $danhsach->Ten }}</td>
                                        <td>{{ $danhsach->TenMon }}</td>
                                        <td>{{ $danhsach->TenLop }}</td>
                                        <td>{{ $danhsach->NgayDiemDanh }}</td>
                                        <td>{{ $danhsach->Ca }}</td>
                                        <td>{{ $danhsach->TietBD }} - {{ $danhsach->TietKT }}</td>
                                        <td>
                                            <div class="search-option">
                                                <select name="SoTietDiMuon[{{ $danhsach->id }}]" id="search__select-option"
                                                    class="select-option search__select-option">
                                                    <option value="1">-- Chọn số tiết --</option>
                                                    <option value="2"
                                                        {{ $danhsach->SoTietDiMuon === 2 ? 'selected' : '' }}>
                                                        Đi học đầy đủ
                                                        - 0
                                                    </option>

                                                    <option value="3"
                                                        {{ $danhsach->SoTietDiMuon === 3 ? 'selected' : '' }}>
                                                        Vắng - 1 tiết
                                                    </option>

                                                    <option value="4"
                                                        {{ $danhsach->SoTietDiMuon === 4 ? 'selected' : '' }}>
                                                        Vắng - 2 tiết
                                                    </option>

                                                    <option value="5"
                                                        {{ $danhsach->SoTietDiMuon === 5 ? 'selected' : '' }}>
                                                        Vắng - 3 tiết
                                                    </option>

                                                    <option value="6"
                                                        {{ $danhsach->SoTietDiMuon === 6 ? 'selected' : '' }}>
                                                        Vắng - 4 tiết
                                                    </option>

                                                    <option value="7"
                                                        {{ $danhsach->SoTietDiMuon === 7 ? 'selected' : '' }}>
                                                        Vắng - 5 tiết
                                                    </option>

                                                    <option value="8"
                                                        {{ $danhsach->SoTietDiMuon === 8 ? 'selected' : '' }}>
                                                        Nghỉ có lí do
                                                    </option>

                                                    <option value="9"
                                                        {{ $danhsach->SoTietDiMuon === 9 ? 'selected' : '' }}>
                                                        Nghỉ không lí
                                                        do
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <input type="text" name="GhiChu[{{ $danhsach->id }}]"
                                                value="{{ $danhsach->GhiChu }}" class="table__input" placeholder="Ghi chú">
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>

                    <div class="btn__action" style="margin-top: 20px;">
                        <div class="grid container">
                            <div class="row">
                                <div class="col flex justify-end content-center" style="width:100%">
                                    <button type="submit" class="btn btn--primary">Lưu điểm danh</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('flatpickr')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var input = document.getElementById('myID');

            flatpickr("#myID", {
                enableTime: false,
                clickOpens: true,
                disableMobile: true,
                onClose: function(selectedDates, dateStr, instance) {
                    // Loại bỏ focus sau khi chọn ngày)
                    input.blur();
                },
                onChange: function(selectedDates, dateStr, instance) {
                    document.getElementById('scheduleForm').submit();
                }
            });
        })
    </script>
@endpush
