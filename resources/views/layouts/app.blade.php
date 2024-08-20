<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trang chủ</title>

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
    <link rel="stylesheet" href="{{ asset('asset') }}/css/danhmuc.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/giangday.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/index.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/info.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/kyluat.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/lichcoithi.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/lienhe.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/login.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/root.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/tinchi.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/tuithi.css">


    <!-- icon -->
    <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Custom js -->
    <script defer src="./js/giangday.js"></script>

    <!-- animation -->
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans ">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="container">
            {{ $slot }}
            <div class="hr"></div>

            <!-- footer -->
            <div class="footer">
                <a href="https://caodanghanoi.edu.vn/" class="footer__nameScholl">Trường Cao đẳng Hà Nội</a>
                <div class="footer__copyright">©2024 Developed by HPC - v1.0</div>
            </div>
        </main>
    </div>
</body>

<!-- bootrap -v: 5.5.5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
