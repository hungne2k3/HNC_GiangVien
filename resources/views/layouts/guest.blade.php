<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Đăng Nhập</title>

    <base href="./">
    <link rel="shortcut icon" href="{{ asset('asset') }}/images/logoHNC.png" type="image/x-icon" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- bootrap -v: 5.5.5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom styles -->
    <link rel="stylesheet" href="/asset/css/library.css">
    <link rel="stylesheet" href="/asset/css/grid.css">
    <link rel="stylesheet" href="/asset/css/login.css">
    <link rel="stylesheet" href="/asset/css/root.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="left-container">
        <div class="logo-container">
            <img src="{{ asset('asset') }}/images/logoHNC.png" alt="Logo">
        </div>
        <div class="portal-name">Cổng Thông Tin Giảng Viên</div>
    </div>

    <div class="right-container">
        <div class="div">
            <div class="header">Trường Cao Đẳng Hà Nội<br>Hanoi College</div>
        </div>
        <!-- Seperator -->
        <hr class="seperator">
        <hr>
        <!-- login-form -->
        <div class="login-form__wrapper">
            {{ $slot }}
        </div>
        <!-- Footer -->
        <div>
            <footer class="flex justify-end content-center">
                <div class="footer">
                    <a href="https://caodanghanoi.edu.vn/" class="link footer--link">Trường Cao đẳng Hà Nội</a>
                    <div class="footer__copyright ">©2024 Developed by HPC - v1.0</div>
                </div>
            </footer>
        </div>
    </div>
</body>

<!-- bootrap -v: 5.5.5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/login.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>

</html>
