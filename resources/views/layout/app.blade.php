<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    @include('layout.header')
    @include('layout.nav')

    <div class="main-container">
        @yield('content')
    </div>

    @include('layout.footer')

</body>
</html>

