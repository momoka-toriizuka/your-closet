<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.5.0/dialog-polyfill.min.js" defer></script>
    <script src="{{ asset('js/modal.js') }}" defer></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

</html>