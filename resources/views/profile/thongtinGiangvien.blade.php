@extends('Lecturer.DefaultLayout.main')
@section('content')
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('asset/css/profile.css') }}">

    <div class="grid container">
        <div class="row">
            <div class="col l-12">
                <h2 style="text-align: center">Thông Tin Giảng Viên</h3>
            </div>
        </div>
        <div class="row flex" style="padding-top: 15px">
            <div class="col l-3">
                <div class="avatar" style="display: flex; justify-content: center; align-item: center; padding-top: 16px">
                    <!-- Hiển thị ảnh hiện tại -->
                    <img src="{{ asset('storage/' . ($giangVien->HinhAnh ?? 'default-profile.png')) }}" alt="Profile Picture" id="imagePreview"
                        style="width: 296px; border-radius: 50%; height: 296px; border: 2px solid #ccc">
                </div>

                {{-- {{ dd($giangVien) }} --}}
                <div class="vcard-name" style="display:flex; justify-content: center; padding: 16px 0">
                   <div style="text-align: center">
                    <span style="font-size: 24px; line-height: 1.25; color: #1f2328; font-weight: 500">{{ $giangVien->HoDem . ' ' .$giangVien->Ten }}</span><br>
                    <span style="font-size: 20px; line-height: 24px; color: #636c76; font-weight: 300">{{ $giangVien->MaGV}}</span><br>
                    <span style="font-size: 20px; line-height: 1.25; color: #1f2328; font-weight: 500; text-transform: capitalize">{{ $nganh->TenNganh }}</span><br>
                   </div>
                </div>

                <!-- Form để upload ảnh mới -->
                <form action="{{ route('profile.uploadAvatar') }}" method="POST" enctype="multipart/form-data" class="flex justify-center">
                    @csrf
                    <button class="btn btn--primary">Chỉnh sửa thông tin</button>
                    <input class="form-input" class="btn" type="file" name="file" accept="image/*" id="uploadInput" 
                        style="display: none;" onchange="this.form.submit();">
                    <button style="display: none" type="button" onclick="document.getElementById('uploadInput').click();" 
                        class="btn btn--primary">Thay đổi ảnh đại diện</button>
                </form>
                {{-- Thành tựu đạt được --}}
                <div class="achievements" style="border-top: 1px solid #ccc; margin-top: 16px; padding-top: 16px">
                    <h5 style="line-height: 24px; padding-bottom: 10px; text-align: center">Thành tựu:</h5>
                    <div class="achievements__logo flex justify-center content-center" style="gap: 10px">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="29" height="29" x="0" y="0" viewBox="0 0 512.003 512.003" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#ff9100" d="M445.023 266.373c12.773 0 25.078-3.691 35.918-10.972 17.9-12.114 30.355-34.102 30.854-56.997.557-11.572 0-23.892-1.699-37.676-.498-3.97-2.52-7.573-5.684-10.02-3.135-2.446-7.119-3.486-11.104-3.032-15.271 1.965-30.919 9.229-43.957 20.599-.615-4.953-1.758-9.998-2.798-14.985 14.648-7.132 26.001-18.675 31.868-33.168 8.35-20.098 5.713-44.883-6.914-64.673-7.061-11.118-14.619-21.284-22.441-30.205-5.479-6.255-14.941-6.826-21.152-1.406-13.535 11.851-22.676 29.048-26.426 49.878-3.135 18.618-1.318 35.874 5.479 51.416 33.484 73.894 4.745 163.906-62.49 205.928-8.438 5.42-13.477 14.634-13.477 25.811 0 8.291 6.475 14.766 14.766 14.766s14.766-6.958 14.766-15.249c1.538-.959 3.003-1.985 4.504-2.988 11.99 10.529 26.58 16.307 42.283 16.318h.498c36.798 0 60.9-30.177 76.289-63.735 3.398-7.368.293-16.084-6.943-19.688-13.696-6.799-29.194-8.782-47.029-6.606a197.253 197.253 0 0 0 6.416-14.028c2.834.357 5.676.712 8.473.712z" opacity="1" data-original="#ff9100"></path><path fill="#fabe2c" d="M162.543 327.677c-71.04-50.476-86.549-136.985-56.572-203.936l-.156-.075c6.288-15.013 8.007-31.796 4.931-50.096-3.691-20.64-12.803-37.837-26.396-49.731-6.211-5.42-15.674-4.849-21.152 1.406-7.822 8.921-15.381 19.087-22.441 30.19-12.627 19.819-15.264 44.619-6.943 64.526 5.858 14.588 17.208 26.158 31.835 33.303-1.02 5.032-1.967 10.049-2.585 15.15-13.101-11.466-29.056-18.768-44.371-20.739-3.926-.425-7.939.586-11.104 3.032s-5.215 6.064-5.684 10.02C.235 174.35-.322 186.684.176 198.154c.645 23.73 13.539 45.806 31.322 57.363 10.4 7.192 22.705 10.869 35.596 10.869 3.043 0 6.127-.363 9.212-.775 1.882 4.66 3.88 9.25 6.125 13.755-13.524-1.793-30.498-1.368-47.095 6.883-3.604 1.787-6.328 4.966-7.588 8.804s-.879 8.013.967 11.587c5.215 9.917 11.396 21.401 19.014 31.685 12.737 18.57 33.64 31.304 58.271 31.304 14.958 0 29.332-5.75 41.19-16.055 1.796 1.269 3.483 2.468 3.781 2.681l.029.615c0 8.291 6.709 15 15 15s15-6.709 15-15c0-16.127-10.225-23.363-18.457-29.193zM256 371.871c-8.291 0-15-6.709-15-15v-60c0-8.291 6.709-15 15-15s15 6.709 15 15v60c0 8.291-6.709 15-15 15z" opacity="1" data-original="#fabe2c" class=""></path><path fill="#ff9100" d="M271 356.871v-60c0-8.291-6.709-15-15-15v90c8.291 0 15-6.709 15-15z" opacity="1" data-original="#ff9100"></path><path fill="#fed843" d="M256.146 311.871c-1.377 0-2.783-.19-4.102-.571C183.725 291.803 136 228.653 136 157.725V71.871a14.965 14.965 0 0 1 7.471-12.949c4.629-2.71 10.371-2.71 14.941-.088.234.132 23.291 13.037 45.088 13.037 15.732 0 35.537-18.442 41.221-24.902 5.742-6.445 16.816-6.445 22.559 0 5.684 6.46 25.488 24.902 41.221 24.902 21.65 0 44.824-12.891 45.059-13.022 4.658-2.637 10.371-2.622 14.971.044a15.013 15.013 0 0 1 7.471 12.979V157.8c0 70.884-47.578 134.004-115.723 153.486a14.813 14.813 0 0 1-4.133.585z" opacity="1" data-original="#fed843" class=""></path><path fill="#fabe2c" d="M256.146 311.871c1.377 0 2.783-.19 4.131-.586C328.422 291.803 376 228.682 376 157.799V71.871a15.014 15.014 0 0 0-7.471-12.979c-4.6-2.666-10.313-2.681-14.971-.044-.234.132-23.408 13.022-45.059 13.022-15.732 0-35.537-18.442-41.221-24.902-2.871-3.223-7.075-4.834-11.279-4.834V311.85c.05.001.098.021.147.021z" opacity="1" data-original="#fabe2c" class=""></path><path fill="#fabe2c" d="M256.117 247.52c-2.432 0-4.834-.586-7.061-1.758C216.332 228.345 196 194.61 196 157.725v-11.147c0-7.837 6.035-14.341 13.828-14.956 12.832-.996 25.957-5.083 39.053-12.129a14.967 14.967 0 0 1 14.238 0c13.096 7.046 26.221 11.133 39.053 12.129 7.793.615 13.828 7.119 13.828 14.956v11.221c0 36.797-20.244 70.503-52.793 87.949a15.056 15.056 0 0 1-7.09 1.772z" opacity="1" data-original="#fabe2c" class=""></path><path fill="#ff9100" d="M256.117 247.52c2.432 0 4.863-.586 7.09-1.772C295.756 228.302 316 194.595 316 157.799v-11.221c0-7.837-6.035-14.341-13.828-14.956-12.832-.996-25.957-5.083-39.053-12.129a14.986 14.986 0 0 0-7.119-1.802v129.8c.04 0 .077.029.117.029z" opacity="1" data-original="#ff9100"></path><path fill="#646d73" d="M346 341.871H166c-8.401 0-15 6.599-15 15v120h210v-120c0-8.401-6.599-15-15-15z" opacity="1" data-original="#646d73" class=""></path><path fill="#474f54" d="M346 341.871h-90v135h105v-120c0-8.401-6.599-15-15-15z" opacity="1" data-original="#474f54" class=""></path><path fill="#fed843" d="M286 431.871h-60c-8.291 0-15-6.709-15-15s6.709-15 15-15h60c8.291 0 15 6.709 15 15s-6.709 15-15 15z" opacity="1" data-original="#fed843" class=""></path><path fill="#fabe2c" d="M286 401.871h-30v30h30c8.291 0 15-6.709 15-15s-6.709-15-15-15z" opacity="1" data-original="#fabe2c" class=""></path><path fill="#474f54" d="M376 491.871H136c-8.291 0-15-6.709-15-15s6.709-15 15-15h240c8.291 0 15 6.709 15 15s-6.709 15-15 15z" opacity="1" data-original="#474f54" class=""></path><path fill="#32393f" d="M376 461.871H256v30h120c8.291 0 15-6.709 15-15s-6.709-15-15-15z" opacity="1" data-original="#32393f"></path></g></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="29" height="29" x="0" y="0" viewBox="0 0 497.948 497.948" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g fill="#fee45a"><path d="M129.116 85.945H118.96c-16.957 0-30.704-13.747-30.704-30.704v-16.52a6.417 6.417 0 0 1 6.418-6.418h3.738c16.957 0 30.704 13.747 30.704 30.704zM98.833 114.498l4.712 8.997c7.868 15.022 26.424 20.821 41.445 12.953l14.634-7.665a6.419 6.419 0 0 0 2.708-8.663l-1.735-3.312c-7.868-15.022-26.424-20.821-41.445-12.953zM74.771 144.467H64.614c-16.957 0-30.704-13.747-30.704-30.704v-16.52a6.417 6.417 0 0 1 6.418-6.418h3.738c16.957 0 30.704 13.747 30.704 30.704v22.938zM44.251 232.304H34.094c-16.957 0-30.704-13.747-30.704-30.704v-16.52a6.417 6.417 0 0 1 6.418-6.418h3.738c16.957 0 30.704 13.747 30.704 30.704v22.938zM45.254 252.882l9.639 3.201c16.093 5.344 33.472-3.37 38.816-19.463l5.206-15.678a6.418 6.418 0 0 0-4.068-8.114l-3.548-1.178c-16.093-5.344-33.472 3.37-38.816 19.463zM69.625 351.706l10.079-1.253c16.828-2.091 28.775-17.428 26.683-34.256l-2.037-16.394a6.418 6.418 0 0 0-7.161-5.578l-3.71.461c-16.828 2.091-28.775 17.428-26.683 34.256zM55.322 321.388l-9.502 3.587c-15.865 5.989-33.581-2.016-39.57-17.88L.415 291.64a6.417 6.417 0 0 1 3.738-8.271l3.497-1.32c15.865-5.989 33.581 2.016 39.57 17.88zM94.489 387.771l-7.182 7.182c-11.991 11.991-31.432 11.991-43.422 0l-11.681-11.681a6.418 6.418 0 0 1 0-9.076l2.643-2.643c11.991-11.991 31.432-11.991 43.422 0zM158.347 437.266l-4.958 8.864c-8.278 14.8-26.986 20.087-41.786 11.81l-14.418-8.064a6.418 6.418 0 0 1-2.469-8.734l1.825-3.263c8.278-14.8 26.986-20.087 41.786-11.81zM188.216 448.961l5.078-8.796c8.479-14.686 3.447-33.464-11.239-41.943l-14.306-8.26a6.418 6.418 0 0 0-8.767 2.349l-1.869 3.237c-8.479 14.686-3.447 33.464 11.239 41.943zM368.833 85.945h10.156c16.957 0 30.704-13.747 30.704-30.704v-16.52a6.417 6.417 0 0 0-6.418-6.418h-3.738c-16.957 0-30.704 13.747-30.704 30.704zM399.115 114.498l-4.712 8.997c-7.868 15.022-26.424 20.821-41.445 12.953l-14.634-7.665a6.417 6.417 0 0 1-2.707-8.663l1.734-3.312c7.868-15.022 26.424-20.821 41.445-12.953zM423.177 144.467h10.156c16.957 0 30.704-13.747 30.704-30.704v-16.52a6.417 6.417 0 0 0-6.418-6.418h-3.738c-16.957 0-30.704 13.747-30.704 30.704zM453.698 232.304h10.156c16.957 0 30.704-13.747 30.704-30.704v-16.52a6.417 6.417 0 0 0-6.418-6.418h-3.738c-16.957 0-30.704 13.747-30.704 30.704zM452.694 252.882l-9.639 3.201c-16.093 5.344-33.472-3.37-38.816-19.463l-5.206-15.678a6.418 6.418 0 0 1 4.068-8.114l3.548-1.178c16.093-5.344 33.472 3.37 38.816 19.463zM428.323 351.706l-10.079-1.252c-16.828-2.091-28.775-17.428-26.683-34.256l2.037-16.394a6.418 6.418 0 0 1 7.161-5.578l3.71.461c16.828 2.091 28.775 17.428 26.683 34.256zM442.626 321.388l9.502 3.587c15.865 5.989 33.581-2.016 39.57-17.88l5.835-15.455a6.417 6.417 0 0 0-3.738-8.271l-3.497-1.32c-15.865-5.989-33.581 2.016-39.57 17.88zM403.46 387.771l7.182 7.182c11.991 11.991 31.432 11.991 43.422 0l11.681-11.681a6.418 6.418 0 0 0 0-9.076l-2.643-2.643c-11.991-11.991-31.432-11.991-43.422 0zM339.601 437.266l4.958 8.864c8.278 14.8 26.986 20.087 41.786 11.81l14.418-8.064a6.418 6.418 0 0 0 2.469-8.734l-1.825-3.263c-8.278-14.8-26.986-20.087-41.786-11.81zM309.732 448.961l-5.078-8.796c-8.479-14.686-3.447-33.464 11.239-41.943l14.306-8.26a6.418 6.418 0 0 1 8.767 2.349l1.869 3.237c8.479 14.686 3.447 33.464-11.239 41.943z" fill="#fee45a" opacity="1" data-original="#fee45a"></path></g><path fill="#fed402" d="m261.533 119.589 25.13 50.92a14.006 14.006 0 0 0 10.545 7.661l56.193 8.165c11.487 1.669 16.073 15.785 7.762 23.888l-40.662 39.636a14.004 14.004 0 0 0-4.028 12.396l9.599 55.966c1.962 11.44-10.046 20.165-20.32 14.763l-50.261-26.424a14.004 14.004 0 0 0-13.034 0l-50.261 26.424c-10.274 5.401-22.282-3.323-20.32-14.763l9.599-55.966a14.004 14.004 0 0 0-4.028-12.396l-40.662-39.636c-8.312-8.102-3.725-22.218 7.762-23.888l56.193-8.165a14.007 14.007 0 0 0 10.545-7.661l25.13-50.92c5.138-10.409 19.98-10.409 25.118 0z" opacity="1" data-original="#fed402" class=""></path><path fill="#fac600" d="M230.838 277.296a14.004 14.004 0 0 0-4.028-12.396l-40.662-39.636c-8.312-8.102-3.725-22.218 7.762-23.888l56.193-8.165a14.007 14.007 0 0 0 10.545-7.661l16.719-33.877-15.835-32.085c-5.137-10.409-19.98-10.409-25.117 0l-25.13 50.92a14.006 14.006 0 0 1-10.545 7.661l-56.193 8.165c-11.487 1.669-16.073 15.785-7.762 23.888l40.662 39.636a14.004 14.004 0 0 1 4.028 12.396l-9.599 55.966c-1.962 11.44 10.046 20.165 20.32 14.763l31.974-16.81z" opacity="1" data-original="#fac600"></path><path fill="#fed402" d="M248.974 465.645c-117.02 0-212.223-95.203-212.223-212.223 0-43.872 13.276-85.976 38.392-121.762 24.548-34.976 58.549-61.47 98.326-76.619a7.5 7.5 0 0 1 5.339 14.017c-36.966 14.078-68.567 38.705-91.387 71.218-23.335 33.248-35.669 72.373-35.669 113.145 0 108.749 88.474 197.223 197.223 197.223s197.223-88.474 197.223-197.223c0-40.772-12.334-79.896-35.669-113.145-22.82-32.514-54.421-57.14-91.387-71.218-3.871-1.474-5.813-5.807-4.339-9.678s5.807-5.814 9.678-4.339c39.777 15.148 73.778 41.643 98.326 76.619 25.116 35.786 38.392 77.89 38.392 121.762-.002 117.02-95.205 212.223-212.225 212.223z" opacity="1" data-original="#fed402" class=""></path></g></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="29" height="29" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g data-name="Layer 3"><path fill="#ce93d8" d="M48.17 23.13A16.163 16.163 0 0 1 20.13 34.1a.474.474 0 0 0-.1-.1 16.166 16.166 0 0 1 22.84-22.83.943.943 0 0 0 .1.1 16.132 16.132 0 0 1 5.2 11.86z" opacity="1" data-original="#ce93d8"></path><path fill="#e1bee7" d="M47.17 22.13A16.169 16.169 0 0 1 20.13 34.1a.474.474 0 0 0-.1-.1 16.166 16.166 0 0 1 22.84-22.83.943.943 0 0 0 .1.1 16.126 16.126 0 0 1 4.2 10.86z" opacity="1" data-original="#e1bee7" class=""></path><path fill="#ec407a" d="M44.21 23.13a12.242 12.242 0 1 1-4.1-9.11 12.229 12.229 0 0 1 4.1 9.11z" opacity="1" data-original="#ec407a"></path><path fill="#f06292" d="M43.21 22.13a12.2 12.2 0 0 1-20.32 9.12 12.2 12.2 0 0 1 17.22-17.23 12.129 12.129 0 0 1 3.1 8.11z" opacity="1" data-original="#f06292"></path><g fill="#66bb6a"><path d="M3.55 27.193a3.991 3.991 0 0 0 2.135.58 5.562 5.562 0 0 0 1.726-.287h.006a4.186 4.186 0 0 0 .554.032 4.792 4.792 0 0 0 3.452-1.351c1.4-1.451 2.37-3.6 1.5-4.909a1.784 1.784 0 0 0-1.355-.781 4.545 4.545 0 0 0-3.341 1.665 5.256 5.256 0 0 0-1.036 1.638 4.689 4.689 0 0 0-1.35-1.349 4.394 4.394 0 0 0-3.493-.737 1.917 1.917 0 0 0-1.214 1.1c-.612 1.522.752 3.364 2.416 4.399zM5.122 35.166a3.538 3.538 0 0 0 1.078.164 5.517 5.517 0 0 0 3.033-1.078c.026-.02.041-.048.065-.07a4.763 4.763 0 0 0 3.4-1.348c1.4-1.452 2.369-3.6 1.5-4.91a1.78 1.78 0 0 0-1.353-.781 4.559 4.559 0 0 0-3.343 1.665 5.781 5.781 0 0 0-1.288 2.312 4.41 4.41 0 0 0-1.8-1.18 4.412 4.412 0 0 0-3.468.142 2.059 2.059 0 0 0-1.011 1.36c-.3 1.449 1.072 3.049 3.187 3.723z" fill="#66bb6a" opacity="1" data-original="#66bb6a"></path><path d="M7.213 41.657a5.239 5.239 0 0 0 3.51-1.73h.137a4.661 4.661 0 0 0 3.26-1.214c1.446-1.395 2.472-3.509 1.635-4.848a1.8 1.8 0 0 0-1.338-.831 4.535 4.535 0 0 0-3.376 1.532 6 6 0 0 0-1.48 2.672 4.268 4.268 0 0 0-2.277-1.009 4.552 4.552 0 0 0-3.333.869 2.154 2.154 0 0 0-.789 1.521c-.087 1.526 1.525 2.825 3.751 3.021.101.013.201.017.3.017zM18.322 39.308a1.8 1.8 0 0 0-1.339-.831 4.529 4.529 0 0 0-3.376 1.532 5.929 5.929 0 0 0-1.444 2.541 4.226 4.226 0 0 0-2.431-.891 4.577 4.577 0 0 0-3.262 1.123 2.191 2.191 0 0 0-.7 1.564c-.007 1.546 1.683 2.723 3.931 2.739h.024a4.985 4.985 0 0 0 3.416-1.723c.086 0 .18.008.283.008a4.66 4.66 0 0 0 3.261-1.215c1.447-1.395 2.473-3.508 1.637-4.847zM56.029 27.52a4.186 4.186 0 0 0 .554-.032h.006a5.562 5.562 0 0 0 1.726.287 3.993 3.993 0 0 0 2.135-.58c1.664-1.035 3.028-2.877 2.416-4.394a1.916 1.916 0 0 0-1.214-1.105 4.392 4.392 0 0 0-3.493.737 4.689 4.689 0 0 0-1.35 1.349 5.256 5.256 0 0 0-1.032-1.636 4.532 4.532 0 0 0-3.341-1.665 1.784 1.784 0 0 0-1.355.781c-.874 1.306.091 3.458 1.5 4.909a4.792 4.792 0 0 0 3.448 1.349zM61.055 30.082a4.617 4.617 0 0 0-5.269 1.038 5.781 5.781 0 0 0-1.281-2.312 4.553 4.553 0 0 0-3.343-1.665 1.784 1.784 0 0 0-1.354.781c-.872 1.306.092 3.458 1.5 4.91a4.763 4.763 0 0 0 3.4 1.348c.024.022.039.05.065.07A5.517 5.517 0 0 0 57.8 35.33a3.574 3.574 0 0 0 1.077-.164c2.115-.674 3.485-2.274 3.187-3.723a2.059 2.059 0 0 0-1.009-1.361z" fill="#66bb6a" opacity="1" data-original="#66bb6a"></path><path d="M56.716 36.233a4.268 4.268 0 0 0-2.277 1.009 6 6 0 0 0-1.48-2.672 4.534 4.534 0 0 0-3.376-1.532 1.8 1.8 0 0 0-1.338.831c-.837 1.339.189 3.453 1.635 4.848a4.661 4.661 0 0 0 3.26 1.214h.137a5.239 5.239 0 0 0 3.51 1.73c.1 0 .2 0 .3-.013 2.226-.2 3.838-1.495 3.751-3.021a2.154 2.154 0 0 0-.789-1.521 4.558 4.558 0 0 0-3.333-.873zM54.268 41.659a4.226 4.226 0 0 0-2.431.891 5.929 5.929 0 0 0-1.444-2.541 4.518 4.518 0 0 0-3.376-1.532 1.8 1.8 0 0 0-1.339.831c-.836 1.339.19 3.452 1.636 4.847a4.66 4.66 0 0 0 3.261 1.215c.1 0 .2 0 .283-.008a4.985 4.985 0 0 0 3.416 1.723h.026c2.248-.016 3.938-1.193 3.931-2.739a2.191 2.191 0 0 0-.7-1.564 4.86 4.86 0 0 0-3.263-1.123z" fill="#66bb6a" opacity="1" data-original="#66bb6a"></path></g><path fill="#43a047" d="M41.989 57.032a1 1 0 0 1-.474-1.881c.693-.578 4.261-5.035 7.366-9.083 6.784-8.62 7.156-24.765 7.159-24.927a1.044 1.044 0 0 1 1.019-.982 1 1 0 0 1 .981 1.019c-.013.689-.392 16.985-7.58 26.117-7.184 9.366-7.818 9.575-8.158 9.686a.977.977 0 0 1-.313.051zM22.011 57.032a.977.977 0 0 1-.313-.051c-.34-.111-.974-.32-8.166-9.7-7.18-9.118-7.559-25.414-7.572-26.103a1 1 0 0 1 .981-1.018.97.97 0 0 1 1.019.981c0 .162.382 16.317 7.151 24.917 3.113 4.058 6.681 8.515 7.374 9.093a1 1 0 0 1-.474 1.881z" opacity="1" data-original="#43a047"></path><path fill="#fff59d" d="M35.433 25.06H35v-8.217a1 1 0 0 0-1-1h-3.815a1 1 0 0 0-.855.483 5.84 5.84 0 0 1-1.63 1.752l-.53.374a1 1 0 0 0 .608 1.817l2.095-.1V25.1l-.381.016a1.814 1.814 0 0 0-1.781 1.824v2.485a1 1 0 0 0 1 1h7.551a1 1 0 0 0 1-1v-2.54a1.827 1.827 0 0 0-1.829-1.825z" opacity="1" data-original="#fff59d"></path></g></g></svg>
                    </div>
                </div>
            </div>
            <div class="col l-9" style="padding-right: 0">
                {{-- view-edit-section --}}
                <div class="view-edit-section form-container">
                    <form action="#" method="POST">
                        {{-- Thông tin chung --}}
                        <div class="info-common">
                            <div class="form__title p-4" style="margin: 0">
                                <svg style="display: flex; margin-bottom: 5px" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="29" height="29" x="0" y="0" viewBox="0 0 511.277 511.277" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                    <path d="M470.375 186.654h-30.471v-3.422c0-8.518-6.93-15.447-15.448-15.447h-60.097c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h60.097c.247 0 .448.2.448.447v91.447c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-73.025h30.471c1.014 0 1.839.825 1.839 1.839v261.658c0 17.163-13.963 31.126-31.126 31.126H70.19c-17.163 0-31.126-13.963-31.126-31.126V203.493c0-1.014.825-1.839 1.839-1.839h31.471v256.513c0 10.576 8.604 19.181 19.181 19.181h329.167c10.577 0 19.181-8.604 19.181-19.181V306.668c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v107.931H303.559c-15.716 0-29.9 6.646-39.92 17.262v-97.015c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v97.016c-10.02-10.616-24.205-17.262-39.92-17.262h-34.08c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h34.08c19.563 0 35.873 14.149 39.263 32.748H91.555a4.185 4.185 0 0 1-4.181-4.181V429.6h55.275c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5H87.374V183.232c0-.247.201-.447.448-.447h60.097c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5H87.822c-8.518 0-15.448 6.93-15.448 15.447v3.422H40.903c-9.285 0-16.839 7.554-16.839 16.839v261.658c0 25.434 20.692 46.126 46.126 46.126h370.896c25.434 0 46.126-20.692 46.126-46.126V203.493c.001-9.285-7.552-16.839-16.837-16.839zM303.559 429.599h121.344v28.568a4.185 4.185 0 0 1-4.181 4.181H264.297c3.389-18.6 19.699-32.749 39.262-32.749z" fill="#000000" opacity="1" data-original="#000000" class=""></path><path d="M156.143 105.231c4.117.382 7.782-2.639 8.171-6.763 2.145-22.744 12.647-43.802 29.575-59.294C210.922 23.586 233.029 15 256.139 15c50.863 0 92.243 41.38 92.243 92.242 0 19.139-5.809 37.493-16.798 53.081a9.67 9.67 0 0 0-.181.268l-47.994 74.718a7.5 7.5 0 0 0-1.19 4.054v9.716a3.58 3.58 0 0 1-3.576 3.576h-.49l4.778-81.075h8.544c12.226 0 22.172-9.946 22.172-22.171v-.91c0-12.225-9.946-22.171-22.172-22.171-11.721 0-21.443 9.166-22.133 20.867l-.553 9.385h-26.301l-.553-9.385c-.689-11.701-10.412-20.867-22.133-20.867-12.226 0-22.172 9.946-22.172 22.171v.91c0 12.225 9.946 22.171 22.172 22.171h8.544l4.775 81.023c-1.727-.252-3.062-1.728-3.062-3.524v-9.716a7.508 7.508 0 0 0-1.189-4.054l-47.995-74.718a7.833 7.833 0 0 0-.18-.268 91.383 91.383 0 0 1-14.442-32.336 7.5 7.5 0 0 0-14.619 3.361 106.318 106.318 0 0 0 16.707 37.482l46.72 72.732v7.515c0 7.573 4.561 14.092 11.076 16.981v12.683c0 13.346 10.857 24.203 24.203 24.203h11.604c13.345 0 24.203-10.857 24.203-24.203v-12.683c6.514-2.889 11.076-9.407 11.076-16.981v-7.515l46.719-72.732c12.72-18.101 19.443-39.395 19.443-61.589C363.381 48.108 315.272 0 256.139 0c-26.868 0-52.572 9.983-72.377 28.109-19.677 18.01-31.887 42.496-34.381 68.951a7.497 7.497 0 0 0 6.762 8.171zm128.173 42.846a7.18 7.18 0 0 1 7.159-6.75c3.955 0 7.172 3.217 7.172 7.171v.91c0 3.954-3.217 7.171-7.172 7.171h-7.66zm-64.514 8.502c-3.955 0-7.172-3.217-7.172-7.171v-.91c0-3.954 3.217-7.171 7.172-7.171a7.179 7.179 0 0 1 7.159 6.75l.501 8.502zm48.103 15-4.777 81.075H248.15l-4.777-81.075zm3.238 107.163c0 5.074-4.128 9.203-9.203 9.203h-11.604c-5.074 0-9.203-4.129-9.203-9.203v-11.088h30.009v11.088zM387.513 56.951a7.472 7.472 0 0 0 4.945-1.864l16.364-14.368a7.5 7.5 0 0 0-9.896-11.272l-16.364 14.368a7.5 7.5 0 0 0 4.951 13.136zM382.562 102.184l16.364 14.369a7.467 7.467 0 0 0 4.946 1.864 7.5 7.5 0 0 0 4.952-13.136L392.46 90.912a7.498 7.498 0 0 0-10.584.688 7.498 7.498 0 0 0 .686 10.584zM103.455 40.719l16.364 14.368a7.467 7.467 0 0 0 4.945 1.864 7.5 7.5 0 0 0 4.951-13.136l-16.364-14.368a7.498 7.498 0 0 0-10.584.688 7.5 7.5 0 0 0 .688 10.584zM108.406 118.417a7.476 7.476 0 0 0 4.946-1.864l16.364-14.369a7.5 7.5 0 0 0-9.897-11.272l-16.364 14.369a7.5 7.5 0 0 0 4.951 13.136zM189.782 260.154a7.5 7.5 0 0 0-7.5-7.5h-73.879c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h73.879a7.5 7.5 0 0 0 7.5-7.5zM205.13 290.805h-83.179c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h83.179c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5zM205.13 327.346h-83.179c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h83.179c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5zM205.13 363.887h-83.179c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h83.179c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5zM411.375 260.154a7.5 7.5 0 0 0-7.5-7.5h-73.879c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h73.879a7.5 7.5 0 0 0 7.5-7.5zM390.326 290.805h-83.179c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h83.179c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5zM390.326 327.346h-83.179c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h83.179c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5zM390.326 363.887h-83.179c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h83.179c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g>
                                </svg>
                                Thông tin chung
                            </div>
                            {{-- Mã GV --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="MaGV"><span class="text-red-600">*</span>Mã Giảng Viên:</label>
                                <input class="input--not-edit" type="text" id="HoDem" name="MaGV" value="{{ $giangVien->MaGV }}" disabled>
                            </div>

                            {{-- Họ Đệm --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="HoDem"><span class="text-red-600">*</span>Họ đệm:</label>
                                <input class="form-input" type="text" id="HoDem" name="HoDem" value="{{ $giangVien->HoDem }}">
                            </div>
    
                            {{-- Tên --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="Ten"><span class="text-red-600">*</span>Tên:</label>
                                <input class="form-input" type="text" id="Ten" name="Ten" value="{{ $giangVien->Ten }}">
                            </div>
    
                            {{-- Tên Khác --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="TenKhac"><span class="text-red-600">*</span>Tên khác:</label>
                                <input class="form-input" type="text" id="TenKhac" name="TenKhac" value="{{ $giangVien->TenKhac }}">
                            </div>

                            {{-- Giới Tính --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="GioiTinh"><span class="text-red-600">*</span>Giới tính:</label>
                                <input class="form-input" type="text" id="GioiTinh" name="GioiTinh" value="{{ $giangVien->GioiTinh }}">
                            </div>

                            {{-- Dân Tộc --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="DanToc_ID"><span class="text-red-600">*</span>Dân tộc:</label>
                                <input class="form-input" type="text" id="DanToc_ID" name="DanToc_ID" value="{{ $dantoc->TenDanToc }}">
                            </div>
                            
                            {{-- Ngày Sinh --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="NgaySinh"><span class="text-red-600">*</span>Ngày sinh:</label>
                                <input class="form-input" type="date" id="NgaySinh" name="NgaySinh" value="{{ $giangVien->NgaySinh }}">
                            </div>

                            {{-- CCCD --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="CCCD"><span class="text-red-600">*</span>CCCD:</label>
                                <input class="form-input" type="text" id="CCCD" name="CCCD" value="{{ $giangVien->CCCD }}">
                            </div>
    
                            {{-- Nơi Cấp CCCD --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="NoiCapCCCD"><span class="text-red-600">*</span>Nơi cấp CCCD:</label>
                                <input class="form-input" type="text" id="NoiCapCCCD" name="NoiCapCCCD" value="{{ $giangVien->NoiCapCCCD }}">
                            </div>
    
                            {{-- Ngày Cấp CCCD --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="NgayCapCCCD"><span class="text-red-600">*</span>Ngày cấp CCCD:</label>
                                <input class="form-input" type="date" id="NgayCapCCCD" name="NgayCapCCCD" value="{{ $giangVien->NgayCapCCCD }}">
                            </div>
    
                            {{-- Số Điện Thoại --}}
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="SDT"><span class="text-red-600">*</span>Số điện thoại:</label>
                                <input class="form-input" type="tel" id="SDT" name="SDT" value="{{ $giangVien->SDT }}">
                            </div>

                            <!-- Email -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="Email"><span class="text-red-600">*</span>Email:</label>
                                <input class="form-input" type="email" id="Email" name="Email" value="{{ $giangVien->Email }}">
                            </div>

                            {{-- Nơi Sinh --}}
                            <div class="per_form-group p-2">
                                <label class="form-group__lable" for="NoiSinh"><span class="text-red-600">*</span>Nơi sinh:</label>
                                <input class="form-input" type="text" id="NoiSinh" name="NoiSinh" value="{{ $giangVien->NoiSinh }}">
                            </div>
    
                            {{-- Quê Quán --}}
                            <div class="per_form-group p-2">
                                <label class="form-group__lable" for="QueQuan"><span class="text-red-600">*</span>Quê quán:</label>
                                <input class="form-input" type="text" id="QueQuan" name="QueQuan" value="{{ $giangVien->QueQuan }}">
                            </div>
    
                            {{-- Địa Chỉ Thường trú --}}
                            <div class="per_form-group p-2">
                                <label class="form-group__lable" for="DiaChiThuongChu"><span class="text-red-600">*</span>Địa chỉ thường trú:</label>
                                <input class="form-input" type="text" id="DiaChiThuongChu" name="DiaChiThuongChu" value="{{ $giangVien->DiaChiThuongChu }}">
                            </div>
    
                            {{-- Chỗ Ở Hiện Nay --}}
                            <div class="per_form-group p-2">
                                <label class="form-group__lable" for="ChoOHienNay"><span class="text-red-600">*</span>Chỗ ở hiện nay:</label>
                                <input class="form-input" type="text" id="ChoOHienNay" name="ChoOHienNay" value="{{ $giangVien->ChoOHienNay }}">
                            </div>

                             <!-- SoBHXH -->
                             <div class="per_form-group p-1">
                                <label class="form-group__lable" for="SoBHXH"><span class="text-red-600">*</span>Số BHXH:</label>
                                <input class="form-input" type="text" id="SoBHXH" name="SoBHXH" value="{{ $giangVien->SoBHXH }}">
                            </div>

                            <!-- NgayTuyenDung -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="NgayTuyenDung"><span class="text-red-600">*</span>Ngày tuyển dụng:</label>
                                <input class="form-input" type="date" id="NgayTuyenDung" name="NgayTuyenDung" value="{{ $giangVien->NgayTuyenDung }}">
                            </div>

                            <!-- TenNganHang -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="TenNganHang"><span class="text-red-600">*</span>Tên ngân hàng:</label>
                                <input class="form-input" type="text" id="TenNganHang" name="TenNganHang" value="{{ $giangVien->TenNganHang }}">
                            </div>

                            <!-- SoTaiKhoanNganHang -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="SoTaiKhoanNganHang"><span class="text-red-600">*</span>Số tài khoản ngân hàng:</label>
                                <input class="form-input" type="text" id="SoTaiKhoanNganHang" name="SoTaiKhoanNganHang" value="{{ $giangVien->SoTaiKhoanNganHang }}">
                            </div>
                        </div>

                        {{-- Trình độ chuyên môn --}}
                        <div class="info-professional-level">
                            <div class="form__title p-4">
                                <svg style="display: flex;" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="29" height="29" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                    <path d="m506.62 141.44-248-86c-1.7-.59-3.54-.59-5.24 0l-248 86C2.16 142.56 0 145.59 0 149s2.16 6.44 5.38 7.56L80 182.44v103.83h.01c.21 15.31 18.81 27.59 55.3 36.5C167.64 330.65 210.5 335 256 335c38.05 0 74.25-3.04 104-8.65v36.03c-9.31 3.3-16 12.19-16 22.62a23.9 23.9 0 0 0 5.38 15.12c-5.75 5.13-9.38 12.59-9.38 20.88v28c0 4.42 3.58 8 8 8h40c4.42 0 8-3.58 8-8v-28c0-8.29-3.63-15.75-9.38-20.88 3.36-4.13 5.38-9.39 5.38-15.12 0-10.43-6.69-19.32-16-22.62v-39.45c.23-.06.46-.11.69-.16C413.39 313.81 432 301.44 432 286V182.44l74.62-25.88c3.22-1.12 5.38-4.15 5.38-7.56s-2.16-6.44-5.38-7.56zM380 441h-24v-20c0-6.62 5.38-12 12-12s12 5.38 12 12zm-20-56c0-4.41 3.59-8 8-8s8 3.59 8 8-3.59 8-8 8-8-3.59-8-8zm-104-66c-44.25 0-85.77-4.18-116.9-11.78C103.74 298.59 96 288.98 96 286v-98.02l157.38 54.57c.85.29 1.74.44 2.62.44s1.77-.15 2.62-.44L360 207.4v102.65c-29.28 5.8-65.61 8.95-104 8.95zm160-33c0 2.89-7.29 12.02-40 20.44V201.85l40-13.87zm-43.33-99.92c-.5-.36-1.04-.69-1.63-.93l-116-47.55c-4.09-1.68-8.76.28-10.44 4.37s.28 8.76 4.37 10.44l101.19 41.48L256 226.53 32.42 149 256 71.47 479.58 149z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g>
                                </svg>
                                Trình độ chuyên môn
                            </div>

                            <!-- TrinhDo -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="TrinhDo"><span class="text-red-600">*</span>Trình độ:</label>
                                <input class="form-input" type="text" id="TrinhDo" name="TrinhDo" value="{{ $giangVien->TrinhDo }}">
                            </div>
                            <!-- TrinhDoGiaoDucPhoThong -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="TrinhDoGiaoDucPhoThong"><span class="text-red-600">*</span>Trình độ giáo dục phổ thông:</label>
                                <input class="form-input" type="text" id="TrinhDoGiaoDucPhoThong" name="TrinhDoGiaoDucPhoThong" value="{{ $giangVien->TrinhDoGiaoDucPhoThong }}">
                            </div>
                            <!-- TrinhDoNgoaiNgu -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="TrinhDoNgoaiNgu"><span class="text-red-600">*</span>Trình độ ngoại ngữ:</label>
                                <input class="form-input" type="text" id="TrinhDoNgoaiNgu" name="TrinhDoNgoaiNgu" value="{{ $giangVien->TrinhDoNgoaiNgu }}">
                            </div>
                            <!-- ChungChiKyNangNghe -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="ChungChiKyNangNghe"><span class="text-red-600">*</span>Chứng chỉ kỹ năng nghề:</label>
                                <input class="form-input" type="text" id="ChungChiKyNangNghe" name="ChungChiKyNangNghe" value="{{ $giangVien->ChungChiKyNangNghe }}">
                            </div>
                            <!-- ChuyenNganhHoc -->
                            <div class="per_form-group p-2">
                                <label class="form-group__lable" for="ChuyenNganhHoc"><span class="text-red-600">*</span>Chuyên ngành học:</label>
                                <input class="form-input" type="text" id="ChuyenNganhHoc" name="ChuyenNganhHoc" value="{{ $giangVien->ChuyenNganhHoc }}">
                            </div>
                            <!-- CoSoDaoTao -->
                            <div class="per_form-group p-2">
                                <label class="form-group__lable" for="CoSoDaoTao"><span class="text-red-600">*</span>Cơ sở đào tạo:</label>
                                <input class="form-input" type="text" id="CoSoDaoTao" name="CoSoDaoTao" value="{{ $giangVien->CoSoDaoTao }}">
                            </div>
                            <!-- ChungChiNghiepVuSuPham -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="ChungChiNghiepVuSuPham"><span class="text-red-600">*</span>Chứng chỉ nghiệp vụ sư phạm:</label>
                                <input class="form-input" type="text" id="ChungChiNghiepVuSuPham" name="ChungChiNghiepVuSuPham" value="{{ $giangVien->ChungChiNghiepVuSuPham }}">
                            </div>
                            <!-- KinhNghiemLamViec -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="KinhNghiemLamViec"><span class="text-red-600">*</span>Kinh nghiệm làm việc:</label>
                                <input class="form-input" type="text" id="KinhNghiemLamViec" name="KinhNghiemLamViec" value="{{ $giangVien->KinhNghiemLV }}">
                            </div>
                        </div>

                        {{-- Tình trạng sức khỏe --}}
                        <div class="info-health-condition">
                            <div class="form__title p-4">
                                <span style="display: flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="29" height="29" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                        <path d="M480.787 26.509h-96.481a7.5 7.5 0 0 0 0 15h96.481c8.94 0 16.213 7.273 16.213 16.213v284.974H15V57.722c0-8.94 7.273-16.213 16.213-16.213h318.092a7.5 7.5 0 0 0 0-15H31.213C14.002 26.509 0 40.511 0 57.722v308.761c0 17.211 14.002 31.213 31.213 31.213h71.801a7.5 7.5 0 0 0 0-15H31.213c-8.94 0-16.213-7.273-16.213-16.213v-8.787h482v8.787c0 8.94-7.273 16.213-16.213 16.213H137.684a7.5 7.5 0 0 0 0 15h47.204l-7.405 42.795h-13.686c-12.407 0-22.5 10.093-22.5 22.5s10.093 22.5 22.5 22.5h184.406c12.407 0 22.5-10.093 22.5-22.5s-10.093-22.5-22.5-22.5h-13.686l-7.405-42.795h153.674c17.211 0 31.213-14.002 31.213-31.213V57.722c.001-17.211-14.001-31.213-31.212-31.213zM319.294 440.491h-20.418a7.5 7.5 0 0 0 0 15h49.327c4.136 0 7.5 3.364 7.5 7.5s-3.364 7.5-7.5 7.5H163.797c-4.136 0-7.5-3.364-7.5-7.5s3.364-7.5 7.5-7.5h100.067a7.5 7.5 0 0 0 0-15h-71.158l7.405-42.795H311.89z" fill="#000000" opacity="1" data-original="#000000" class=""></path><path d="M405.719 216.277a7.501 7.501 0 0 0-6.685 4.099l-35.394 69.565-29.868-58.705a7.501 7.501 0 0 0-13.37 0l-16.191 31.823H278.36a7.5 7.5 0 0 0 0 15h30.45a7.501 7.501 0 0 0 6.685-4.099l11.592-22.783 29.868 58.705a7.501 7.501 0 0 0 13.37 0l35.394-69.565 17.117 33.644a7.501 7.501 0 0 0 6.685 4.099h30.45a7.5 7.5 0 0 0 0-15H434.12l-21.716-42.683a7.5 7.5 0 0 0-6.685-4.1zM278.363 194.059h38.919a7.5 7.5 0 0 0 7.5-7.5v-78.954a7.5 7.5 0 0 0-7.5-7.5h-38.919a7.5 7.5 0 0 0-7.5 7.5v78.954a7.5 7.5 0 0 0 7.5 7.5zm7.5-78.954h23.919v63.954h-23.919zM388.891 121.56h-38.919a7.5 7.5 0 0 0-7.5 7.5v57.499a7.5 7.5 0 0 0 7.5 7.5h38.919a7.5 7.5 0 0 0 7.5-7.5V129.06a7.5 7.5 0 0 0-7.5-7.5zm-7.5 57.499h-23.919V136.56h23.919zM459.971 194.059a7.5 7.5 0 0 0 7.5-7.5V87.81a7.5 7.5 0 0 0-7.5-7.5h-38.919a7.5 7.5 0 0 0-7.5 7.5v98.749a7.5 7.5 0 0 0 7.5 7.5zM428.552 95.31h23.919v83.749h-23.919zM221.898 165.152h-170a7.5 7.5 0 0 0 0 15h170a7.5 7.5 0 0 0 0-15zM51.898 219.993H82.32a7.5 7.5 0 0 0 0-15H51.898a7.5 7.5 0 0 0 0 15zM221.898 204.993H116.685a7.5 7.5 0 0 0 0 15h105.213a7.5 7.5 0 0 0 0-15zM221.898 80.31h-170a7.5 7.5 0 0 0 0 15h170a7.5 7.5 0 0 0 0-15zM51.898 135.152H157.32a7.5 7.5 0 0 0 0-15H51.898a7.5 7.5 0 0 0 0 15zM221.898 120.152h-30.213a7.5 7.5 0 0 0 0 15h30.213a7.5 7.5 0 0 0 0-15zM229.398 251.851a7.5 7.5 0 0 0-7.5-7.5h-170a7.5 7.5 0 0 0 0 15h170a7.5 7.5 0 0 0 7.5-7.5zM51.898 283.981a7.5 7.5 0 0 0 0 15h80a7.5 7.5 0 0 0 0-15z" fill="#000000" opacity="1" data-original="#000000" class="">
                                        </path></g>
                                    </svg>
                                </span>
                                Tình trạng sức khỏe
                            </div>
                            <!-- TinhTrangSucKhoe -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="TinhTrangSucKhoe"><span class="text-red-600">*</span>Tình trạng sức khỏe:</label>
                                <input class="form-input" type="text" id="TinhTrangSucKhoe" name="TinhTrangSucKhoe" value="{{ $giangVien->TinhTrangSucKhoe }}">
                            </div>
                            <!-- ChieuCao -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="ChieuCao"><span class="text-red-600">*</span>Chiều cao (cm):</label>
                                <input class="form-input" type="text" id="ChieuCao" name="ChieuCao" value="{{ $giangVien->ChieuCao }}">
                            </div>
                            <!-- CanNang -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="CanNang"><span class="text-red-600">*</span>Cân nặng (kg):</label>
                                <input class="form-input" type="text" id="CanNang" name="CanNang" value="{{ $giangVien->CanNang }}">
                            </div>
                            <!-- NhomMau -->
                            <div class="per_form-group p-1">
                                <label class="form-group__lable" for="NhomMau"><span class="text-red-600">*</span>Nhóm máu:</label>
                                <input class="form-input" type="text" id="NhomMau" name="NhomMau" value="{{ $giangVien->NhomMau }}">
                            </div>
                        </div>
                        <div class="per_form-group p-4 content-end" style="padding: 20px 20px 40px 20px">
                            <button style="display: flex" type="button" 
                                    onclick="document.getElementById('uploadInput').click();" 
                                    class="btn btn--primary">Lưu thay đổi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
