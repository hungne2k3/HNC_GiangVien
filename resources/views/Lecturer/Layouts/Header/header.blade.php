<header>
    <link rel="stylesheet" href="{{ asset('asset/css/library.css') }}">
    <!-- Navigation bar -->
    <nav class="nav">
        <div class="grid container">
            <div class="row">
                <div class="col l-12">
                    <ul class="flex content-center navbar">
                        <li class="nav__item"><a class="link link--primary nav--link" href="/home">Giới Thiệu</a>
                        </li>
                        <li class="nav__item">
                            <a class="link link--primary nav--link dropdown" href="#">Giảng Dạy</a>
                            <ul class="dropdown-menu" style="min-width: 200px;">
                                <li class="dropdown__item"><a href="#" class="link link--black dropdown--link">Xem
                                        thời khoá biểu</a></li>
                                <li class="dropdown__item"><a href="./lichcoithi.html"
                                        class="link link--black dropdown--link">Tra cứu lịch coi thi</a></li>
                                <li class="dropdown__item"><a href="#" class="link link--black dropdown--link">Sổ
                                        nhật ký giảng dạy</a></li>
                            </ul>
                        </li>
                        <li class="nav__item">
                            <a class="link link--primary nav--link dropdown" href="#">Quản lý quá trình điểm</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown__item">
                                    <a href="/diem-danh-sinh-vien" class="link link--black dropdown--link">Điểm danh
                                        sinh viên</a>
                                </li>
                                <li class="dropdown__item"><a href="./nhapdiemthanhphan.html"
                                        class="link link--black dropdown--link">Nhập điểm thành phần</a></li>
                                <li class="dropdown__item"><a href="#"
                                        class="link link--black dropdown--link">Nhập điểm thi</a></li>
                            </ul>
                        </li>
                        <li class="nav__item">
                            <a class="link link--primary nav--link dropdown" href="#">Danh mục biểu mẫu</a>
                            <ul class="dropdown-menu" style="min-width: 200px;">
                                <li class="dropdown__item"><a href="./bieumau.html"
                                        class="link link--black dropdown--link">Danh sách biểu mẫu</a></li>
                            </ul>
                        </li>
                        <li class="nav__item flex content-center">
                            <a class="link link--primary nav--link dropdown" href="#">
                                <span style="line-height: normal;"><svg class="nav__icon"
                                        xmlns="http://www.w3.org/2000/svg" class="ionicon s-ion-icon"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M256 256a112 112 0 10-112-112 112 112 0 00112 112zm0 32c-69.42 0-208 42.88-208 128v64h416v-64c0-85.12-138.58-128-208-128z">
                                        </path>
                                    </svg></span>
                                {{ Auth::user()->HoDem . ' ' . Auth::user()->Ten }}
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown__item"><a href="#"
                                        class="link link--black dropdown--link">Thông tin cá nhân</a>
                                </li>

                                <li class="dropdown__item">
                                    <a href="/thay-doi-mat-khau" class="link link--black dropdown--link" id="link--change-password">
                                        <span class="flex content-center"><svg class="nav__icon" style="fill: #000"
                                                xmlns="http://www.w3.org/2000/svg" class="ionicon s-ion-icon"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M368 192h-16v-80a96 96 0 10-192 0v80h-16a64.07 64.07 0 00-64 64v176a64.07 64.07 0 0064 64h224a64.07 64.07 0 0064-64V256a64.07 64.07 0 00-64-64zm-48 0H192v-80a64 64 0 11128 0z">
                                                </path>
                                            </svg></span>
                                        Đổi mật khẩu
                                    </a>
                                </li>
                                <li class="dropdown__item">
                                    <form method="POST" action="{{ route('logout') }}" style="width: 100%">
                                        @csrf
                                            <x-dropdown-link
                                                class="dropdown-item text-nav fw-bold nav-link p-3 link link--black dropdown--link"
                                                :href="route('logout')"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                <svg height="14px" width="14px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 30.143 30.143" xml:space="preserve" fill="#000000">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier"> <g> 
                                                            <path style="fill:#030104;" d="M20.034,2.357v3.824c3.482,1.798,5.869,5.427,5.869,9.619c0,5.98-4.848,10.83-10.828,10.83 c-5.982,0-10.832-4.85-10.832-10.83c0-3.844,2.012-7.215,5.029-9.136V2.689C4.245,4.918,0.731,9.945,0.731,15.801 c0,7.921,6.42,14.342,14.34,14.342c7.924,0,14.342-6.421,14.342-14.342C29.412,9.624,25.501,4.379,20.034,2.357z"></path> 
                                                            <path style="fill:#030104;" d="M14.795,17.652c1.576,0,1.736-0.931,1.736-2.076V2.08c0-1.148-0.16-2.08-1.736-2.08 c-1.57,0-1.732,0.932-1.732,2.08v13.496C13.062,16.722,13.225,17.652,14.795,17.652z"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                {{ __('Đăng Xuất') }}
                                            </x-dropdown-link>
                                    </form>
                                </li>
                            </ul>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
