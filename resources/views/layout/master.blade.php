<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <title>Apotek</title>
</head>
<body>
    @include('layout.header')
    @yield('content')
    @yield('scripts')
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/js/jquery.min.js') }}"></script>

    @include('layout.footer')
</body>
</html>