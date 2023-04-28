<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="content cadetblue">
        @yield('content')
    </div>
</body>
</html>