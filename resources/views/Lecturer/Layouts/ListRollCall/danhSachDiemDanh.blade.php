@extends('Lecturer.DefaultLayout.main')

@section('content')
    <div class="grid container">
        <div class="row">
            <div class="col l-12 flex flex-col content-center" style="position: relative;">
                <div class="content__title">
                    <h3>Điểm danh sinh viên</h3>
                    <div class="content__desc">
                        <label>Môn học: An toàn và bảo mật thông tin</label>
                        <label>Lớp học phần: 1621CNT03</label>
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
                            <tr class="tr__title">
                                <td>1</td>
                                <td>2109610335</td>
                                <td>Phạm Xuân Huy</td>
                                <td>An toàn và bảo mật thông tin</td>
                                <td>1621CNT03</td>
                                <td>15/07/2024</td>
                                <td>Sáng</td>
                                <td>Tiết 1-5</td>
                                <td>
                                    <div class="search-option">
                                        <select name="search__select-option justify-center" id="search__select-option"
                                            class="select-option search__select-option">
                                            <option value="1">-- Chọn số tiết --</option>
                                            <option value="2">Đi học đầy đủ - 0</option>
                                            <option value="3">Vắng - 1 tiết</option>
                                            <option value="3">Vắng - 2 tiết</option>
                                            <option value="3">Vắng - 3 tiết</option>
                                            <option value="3">Vắng - 4 tiết</option>
                                            <option value="3">Vắng - 5 tiết</option>
                                            <option value="3">Nghỉ có lí do</option>
                                            <option value="3">Nghỉ không lí do</option>
                                        </select>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <input type="text" value="Vào học muộn 45 phút" class="table__input">
                                </td>
                            </tr>
                            <tr class="tr__title">
                                <td>1</td>
                                <td>2109610335</td>
                                <td>Phạm Xuân Huy</td>
                                <td>An toàn và bảo mật thông tin</td>
                                <td>1621CNT03</td>
                                <td>15/07/2024</td>
                                <td>Sáng</td>
                                <td>Tiết 1-5</td>
                                <td>
                                    <div class="search-option">
                                        <select name="search__select-option justify-center" id="search__select-option"
                                            class="select-option search__select-option">
                                            <option value="1">-- Chọn số tiết --</option>
                                            <option value="2">Đi học đầy đủ - 0</option>
                                            <option value="3">Vắng - 1 tiết</option>
                                            <option value="3">Vắng - 2 tiết</option>
                                            <option value="3">Vắng - 3 tiết</option>
                                            <option value="3">Vắng - 4 tiết</option>
                                            <option value="3">Vắng - 5 tiết</option>
                                            <option value="3">Nghỉ có lí do</option>
                                            <option value="3">Nghỉ không lí do</option>
                                        </select>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <input type="text" value="Vào học muộn 45 phút" class="table__input">
                                </td>
                            </tr>
                            <tr class="tr__title">
                                <td>1</td>
                                <td>2109610335</td>
                                <td>Phạm Xuân Huy</td>
                                <td>An toàn và bảo mật thông tin</td>
                                <td>1621CNT03</td>
                                <td>15/07/2024</td>
                                <td>Sáng</td>
                                <td>Tiết 1-5</td>
                                <td>
                                    <div class="search-option">
                                        <select name="search__select-option justify-center" id="search__select-option"
                                            class="select-option search__select-option">
                                            <option value="1">-- Chọn số tiết --</option>
                                            <option value="2">Đi học đầy đủ - 0</option>
                                            <option value="3">Vắng - 1 tiết</option>
                                            <option value="3">Vắng - 2 tiết</option>
                                            <option value="3">Vắng - 3 tiết</option>
                                            <option value="3">Vắng - 4 tiết</option>
                                            <option value="3">Vắng - 5 tiết</option>
                                            <option value="3">Nghỉ có lí do</option>
                                            <option value="3">Nghỉ không lí do</option>
                                        </select>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <input type="text" value="Vào học muộn 45 phút" class="table__input">
                                </td>
                            </tr>
                            <tr class="tr__title">
                                <td>1</td>
                                <td>2109610335</td>
                                <td>Phạm Xuân Huy</td>
                                <td>An toàn và bảo mật thông tin</td>
                                <td>1621CNT03</td>
                                <td>15/07/2024</td>
                                <td>Sáng</td>
                                <td>Tiết 1-5</td>
                                <td>
                                    <div class="search-option">
                                        <select name="search__select-option justify-center" id="search__select-option"
                                            class="select-option search__select-option">
                                            <option value="1">-- Chọn số tiết --</option>
                                            <option value="2">Đi học đầy đủ - 0</option>
                                            <option value="3">Vắng - 1 tiết</option>
                                            <option value="3">Vắng - 2 tiết</option>
                                            <option value="3">Vắng - 3 tiết</option>
                                            <option value="3">Vắng - 4 tiết</option>
                                            <option value="3">Vắng - 5 tiết</option>
                                            <option value="3">Nghỉ có lí do</option>
                                            <option value="3">Nghỉ không lí do</option>
                                        </select>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <input type="text" value="Vào học muộn 45 phút" class="table__input">
                                </td>
                            </tr>
                            <tr class="tr__title">
                                <td>1</td>
                                <td>2109610335</td>
                                <td>Phạm Xuân Huy</td>
                                <td>An toàn và bảo mật thông tin</td>
                                <td>1621CNT03</td>
                                <td>15/07/2024</td>
                                <td>Sáng</td>
                                <td>Tiết 1-5</td>
                                <td>
                                    <div class="search-option">
                                        <select name="search__select-option justify-center" id="search__select-option"
                                            class="select-option search__select-option">
                                            <option value="1">-- Chọn số tiết --</option>
                                            <option value="2">Đi học đầy đủ - 0</option>
                                            <option value="3">Vắng - 1 tiết</option>
                                            <option value="3">Vắng - 2 tiết</option>
                                            <option value="3">Vắng - 3 tiết</option>
                                            <option value="3">Vắng - 4 tiết</option>
                                            <option value="3">Vắng - 5 tiết</option>
                                            <option value="3">Nghỉ có lí do</option>
                                            <option value="3">Nghỉ không lí do</option>
                                        </select>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <input type="text" value="Vào học muộn 45 phút" class="table__input">
                                </td>
                            </tr>
                            <tr class="tr__title">
                                <td>1</td>
                                <td>2109610335</td>
                                <td>Phạm Xuân Huy</td>
                                <td>An toàn và bảo mật thông tin</td>
                                <td>1621CNT03</td>
                                <td>15/07/2024</td>
                                <td>Sáng</td>
                                <td>Tiết 1-5</td>
                                <td>
                                    <div class="search-option">
                                        <select name="search__select-option justify-center" id="search__select-option"
                                            class="select-option search__select-option">
                                            <option value="1">-- Chọn số tiết --</option>
                                            <option value="2">Đi học đầy đủ - 0</option>
                                            <option value="3">Vắng - 1 tiết</option>
                                            <option value="3">Vắng - 2 tiết</option>
                                            <option value="3">Vắng - 3 tiết</option>
                                            <option value="3">Vắng - 4 tiết</option>
                                            <option value="3">Vắng - 5 tiết</option>
                                            <option value="3">Nghỉ có lí do</option>
                                            <option value="3">Nghỉ không lí do</option>
                                        </select>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <input type="text" value="Vào học muộn 45 phút" class="table__input">
                                </td>
                            </tr>
                            <tr class="tr__title">
                                <td>1</td>
                                <td>2109610335</td>
                                <td>Phạm Xuân Huy</td>
                                <td>An toàn và bảo mật thông tin</td>
                                <td>1621CNT03</td>
                                <td>15/07/2024</td>
                                <td>Sáng</td>
                                <td>Tiết 1-5</td>
                                <td>
                                    <div class="search-option">
                                        <select name="search__select-option justify-center" id="search__select-option"
                                            class="select-option search__select-option">
                                            <option value="1">-- Chọn số tiết --</option>
                                            <option value="2">Đi học đầy đủ - 0</option>
                                            <option value="3">Vắng - 1 tiết</option>
                                            <option value="3">Vắng - 2 tiết</option>
                                            <option value="3">Vắng - 3 tiết</option>
                                            <option value="3">Vắng - 4 tiết</option>
                                            <option value="3">Vắng - 5 tiết</option>
                                            <option value="3">Nghỉ có lí do</option>
                                            <option value="3">Nghỉ không lí do</option>
                                        </select>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <input type="text" value="Vào học muộn 45 phút" class="table__input">
                                </td>
                            </tr>
                            <tr class="tr__title">
                                <td>1</td>
                                <td>2109610335</td>
                                <td>Phạm Xuân Huy</td>
                                <td>An toàn và bảo mật thông tin</td>
                                <td>1621CNT03</td>
                                <td>15/07/2024</td>
                                <td>Sáng</td>
                                <td>Tiết 1-5</td>
                                <td>
                                    <div class="search-option">
                                        <select name="search__select-option justify-center" id="search__select-option"
                                            class="select-option search__select-option">
                                            <option value="1">-- Chọn số tiết --</option>
                                            <option value="2">Đi học đầy đủ - 0</option>
                                            <option value="3">Vắng - 1 tiết</option>
                                            <option value="3">Vắng - 2 tiết</option>
                                            <option value="3">Vắng - 3 tiết</option>
                                            <option value="3">Vắng - 4 tiết</option>
                                            <option value="3">Vắng - 5 tiết</option>
                                            <option value="3">Nghỉ có lí do</option>
                                            <option value="3">Nghỉ không lí do</option>
                                        </select>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <input type="text" value="Vào học muộn 45 phút" class="table__input">
                                </td>
                            </tr>
                            <tr class="tr__title">
                                <td>1</td>
                                <td>2109610335</td>
                                <td>Phạm Xuân Huy</td>
                                <td>An toàn và bảo mật thông tin</td>
                                <td>1621CNT03</td>
                                <td>15/07/2024</td>
                                <td>Sáng</td>
                                <td>Tiết 1-5</td>
                                <td>
                                    <div class="search-option">
                                        <select name="search__select-option justify-center" id="search__select-option"
                                            class="select-option search__select-option">
                                            <option value="1">-- Chọn số tiết --</option>
                                            <option value="2">Đi học đầy đủ - 0</option>
                                            <option value="3">Vắng - 1 tiết</option>
                                            <option value="3">Vắng - 2 tiết</option>
                                            <option value="3">Vắng - 3 tiết</option>
                                            <option value="3">Vắng - 4 tiết</option>
                                            <option value="3">Vắng - 5 tiết</option>
                                            <option value="3">Nghỉ có lí do</option>
                                            <option value="3">Nghỉ không lí do</option>
                                        </select>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <input type="text" value="Vào học muộn 45 phút" class="table__input">
                                </td>
                            </tr>
                            <tr class="tr__title">
                                <td>1</td>
                                <td>2109610335</td>
                                <td>Phạm Xuân Huy</td>
                                <td>An toàn và bảo mật thông tin</td>
                                <td>1621CNT03</td>
                                <td>15/07/2024</td>
                                <td>Sáng</td>
                                <td>Tiết 1-5</td>
                                <td>
                                    <div class="search-option">
                                        <select name="search__select-option justify-center" id="search__select-option"
                                            class="select-option search__select-option">
                                            <option value="1">-- Chọn số tiết --</option>
                                            <option value="2">Đi học đầy đủ - 0</option>
                                            <option value="3">Vắng - 1 tiết</option>
                                            <option value="3">Vắng - 2 tiết</option>
                                            <option value="3">Vắng - 3 tiết</option>
                                            <option value="3">Vắng - 4 tiết</option>
                                            <option value="3">Vắng - 5 tiết</option>
                                            <option value="3">Nghỉ có lí do</option>
                                            <option value="3">Nghỉ không lí do</option>
                                        </select>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <input type="text" value="Vào học muộn 45 phút" class="table__input">
                                </td>
                            </tr>
                            <tr class="tr__title">
                                <td>1</td>
                                <td>2109610335</td>
                                <td>Phạm Xuân Huy</td>
                                <td>An toàn và bảo mật thông tin</td>
                                <td>1621CNT03</td>
                                <td>15/07/2024</td>
                                <td>Sáng</td>
                                <td>Tiết 1-5</td>
                                <td>
                                    <div class="search-option">
                                        <select name="search__select-option justify-center" id="search__select-option"
                                            class="select-option search__select-option">
                                            <option value="1">-- Chọn số tiết --</option>
                                            <option value="2">Đi học đầy đủ - 0</option>
                                            <option value="3">Vắng - 1 tiết</option>
                                            <option value="3">Vắng - 2 tiết</option>
                                            <option value="3">Vắng - 3 tiết</option>
                                            <option value="3">Vắng - 4 tiết</option>
                                            <option value="3">Vắng - 5 tiết</option>
                                            <option value="3">Nghỉ có lí do</option>
                                            <option value="3">Nghỉ không lí do</option>
                                        </select>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <input type="text" value="Vào học muộn 45 phút" class="table__input">
                                </td>
                            </tr>
                        </tbody>
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
