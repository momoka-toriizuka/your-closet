<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>    <!-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>    <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>

    <title>{{ config('app.name', 'YourCloset') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @if(config('app.env') === 'production')
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    @else
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif
</head>

<body class="body">
    <!-- 画面によって違う部分 -->
    <div class="content">
        @yield('content')
    </div>
</body>
<!-- <script src="{{ asset('js/modal.js') }}"></script> -->
</html>