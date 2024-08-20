<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="{{ asset('/asset/images/logoHNC.png') }}" type="image/x-icon">
    @include('Lecturer.DefaultLayout.heade')
</head>

<body>
    <div class="root">
        {{-- header --}}
        @include('Lecturer.Layouts.Header.header')

        {{-- main --}}
        @yield('content')

        {{-- footer --}}
        @include('Lecturer.DefaultLayout.footer')
    </div>
</body>

</html>
