@extends('Lecturer.DefaultLayout.main')

@section('content')
    <title>{{ $title }}</title>

    <div class="grid container">
        <div class="row flex flex-col" style="margin-top: 40px">
            <div class="col l-3">
                <div class="avatar">
                    <!-- Hiển thị ảnh hiện tại -->
                    <img src="{{ asset('storage/' . ($hoSo->HinhAnh ?? 'default-profile.png')) }}" alt="Profile Picture" id="imagePreview"
                        style="width: 240px; border-radius: 50%; height: 240px; border: 1px solid #ccc">
                </div>

                <div class="vcard-name">
                    <span>{{ $hoSo->HoDem . ' ' .$hoSo->Ten }}</span><br>
                    <span></span><br>
                </div>

                <!-- Form để upload ảnh mới -->
                <form action="{{ route('profile.uploadAvatar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="btn" type="file" name="file" accept="image/*" id="uploadInput" 
                        style="display: none;" onchange="this.form.submit();">
                    <button type="button" onclick="document.getElementById('uploadInput').click();" 
                        class="btn btn--outline btn--search">Change Profile Picture</button>
                </form>
            </div>
            <div class="col l-9">
                <!-- Thông tin khác -->
            </div>
        </div>
    </div>
@endsection
