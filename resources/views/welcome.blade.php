<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta content="width=device-width">
<meta content="height=device-height">

<head>
    <meta charset="utf-8">

    <title>Your Closet</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="content">
    <main class="before-login">
        <div class="app-title">
            <h1 class="your-closet">Your Closet</h1>
        </div>
        <div class="to-items">
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/items') }}" class="auth-link">アイテム一覧へ</a>
            @else
            <a href="{{ route('login') }}" class="auth-link">ログイン</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="auth-link">会員登録</a>
            @endif
            @endauth
            @endif
        </div>
    </main>
</body>

</html>