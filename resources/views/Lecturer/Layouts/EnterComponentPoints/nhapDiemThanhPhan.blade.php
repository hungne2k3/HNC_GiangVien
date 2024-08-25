@extends('Lecturer.DefaultLayout.main')

@section('content')
    <div class="grid container">
        <div class="row">
            <div class="col l-12 flex flex-col content-center">
                <div class="content__title">
                    <h3>Nhập điểm thành phần</h3>

                    <div class="content__desc">
                        <label>Tên môn: </label>
                        <label>Lớp: </label>
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
                                <th>DiemTX1</th>
                                <th>DiemDK1</th>
                                <th>DiemTX2</th>
                                <th>DiemDK2</th>
                                <th>DiemTB</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr class="tr__title">
                                <td></td>
                            </tr>


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
