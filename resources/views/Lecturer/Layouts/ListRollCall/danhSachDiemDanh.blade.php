@extends('Lecturer.DefaultLayout.main')

@section('content')
    <div class="grid container">
        <div class="row">
            <div class="col l-12 flex flex-col content-center" style="position: relative;">
                <div class="content__title">
                    <h2>ĐIỂM DANH SINH VIÊN</h2>
                    <div class="content__desc">
                        @if ($danhSachDiemDanh)
                            <label>Tên môn: {{ $danhSachDiemDanh['diemDanh']->TenMon }}</label>
                            <label>Lớp: {{ $danhSachDiemDanh['diemDanh']->TenLop }}</label>
                        @endif
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
                    <input type="date" id="selected_date" name="selected_date" class="flatpick input-date ct-shape"
                        value="{{ $currentDate->format('Y-m-d') }}" placeholder="{{ $currentDate->format('Y-m-d') }}"
                        style="padding: 10px;
                        border-radius: 4px;
                        outline: none;
                        border: 1px solid #ccc;"
                        onchange="updateRollCallDates(this.value)">
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
                                        <td>
                                            <input type="date" class="NgayDiemDanhField"
                                                name="NgayDiemDanh[{{ $danhsach->id }}]"
                                                value="{{ $currentDate->format('Y-m-d') }}"
                                                style="padding: 10px;
                                            border-radius: 4px;
                                            outline: none;
                                            border: 1px solid #ccc;">
                                        </td>
                                        <td>{{ $danhsach->Ca }}</td>
                                        <td>{{ $danhsach->TietBD }} - {{ $danhsach->TietKT }}</td>
                                        <td>
                                            <div class="search-option">
                                                <select name="SoTietDiMuon[{{ $danhsach->id }}]" id="search__select-option"
                                                    class="select-option search__select-option">
                                                    <option value="1">-- Chọn số tiết --</option>
                                                    <option value="Đi học đầy đủ"
                                                        {{ $danhsach->SoTietDiMuon === 'Đi học đầy đủ' ? 'selected' : '' }}>
                                                        Đi học đầy đủ
                                                    </option>

                                                    <option value="Vắng - 1 tiết"
                                                        {{ $danhsach->SoTietDiMuon === 'Vắng - 1 tiết' ? 'selected' : '' }}>
                                                        Vắng - 1 tiết
                                                    </option>

                                                    <option value="Vắng - 2 tiết"
                                                        {{ $danhsach->SoTietDiMuon === 'Vắng - 2 tiết' ? 'selected' : '' }}>
                                                        Vắng - 2 tiết
                                                    </option>

                                                    <option value="Vắng - 3 tiết"
                                                        {{ $danhsach->SoTietDiMuon === 'Vắng - 3 tiết' ? 'selected' : '' }}>
                                                        Vắng - 3 tiết
                                                    </option>

                                                    <option value="Vắng - 4 tiết"
                                                        {{ $danhsach->SoTietDiMuon === 'Vắng - 4 tiết' ? 'selected' : '' }}>
                                                        Vắng - 4 tiết
                                                    </option>

                                                    <option value="Vắng - 5 tiết"
                                                        {{ $danhsach->SoTietDiMuon === 'Vắng - 5 tiết' ? 'selected' : '' }}>
                                                        Vắng - 5 tiết
                                                    </option>

                                                    <option value="Nghỉ có lí do"
                                                        {{ $danhsach->SoTietDiMuon === 'Nghỉ có lí do' ? 'selected' : '' }}>
                                                        Nghỉ có lí do
                                                    </option>

                                                    <option
                                                        value="Nghỉ không lí
                                                        do"
                                                        {{ $danhsach->SoTietDiMuon ===
                                                        'Nghỉ không lí
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                do'
                                                            ? 'selected'
                                                            : '' }}>
                                                        Nghỉ không lí
                                                        do
                                                    </option>
                                                </select>

                                                <!-- Input ẩn để lưu giá trị text của option được chọn -->
                                                <input type="hidden" name="SoTietDiMuonText[{{ $danhsach->id }}]"
                                                    class="hidden-input">
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
                                <div class="col flex justify-end content-center" style="width:100%; margin-left: -15px;">
                                    <button type="submit" class="btn btn--primary">Lưu điểm danh
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    function updateRollCallDates(selectedDate) {
        // Lấy tất cả các input NgayDiemDanh
        const ngayDiemDanhFields = document.querySelectorAll('.NgayDiemDanhField');

        // Cập nhật giá trị của từng input với ngày được chọn
        ngayDiemDanhFields.forEach(field => {
            field.value = selectedDate;
        });
    }
</script>

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
