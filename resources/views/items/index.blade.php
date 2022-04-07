@extends('layouts.app')

@section('content')

<!-- アプリのタイトル -->
<div class="headline">
    <h1 class="your-closet">Your Closet</h1>
</div>

<!-- ユーザー認証メニュー -->
<ul class="auth-menu">
    @guest
    @if (Route::has('login'))
    <li>
        <a class="link-after-login" href="{{ route('login') }}">ログイン</a>
    </li>
    @endif

    @if (Route::has('register'))
    <li>
        <a class="link-after-login" href="{{ route('register') }}">会員登録</a>
    </li>
    @endif
    @else
    <li>
        <a class="link-after-login" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            ログアウト
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </li>
    @endguest
</ul>

<!-- アイテム一覧表示 -->
<main class="panel">
    <div class="panel-headline">
        <h2 class="current-page">すべてのアイテム</h2>
    </div>

    <div class="panel-body">
        <!-- アイテムがない場合 -->
        @if (count($items) == 0)
        <div class="message">
            <p class="no-items-tags">アイテムがありません。</p>
        </div>

        <!-- アイテムがある場合 -->
        @elseif (count($items) > 0)
        @foreach ($items as $item)
        <div class="item-photo">
            <img src="{{ $item->image }}" alt="">
        </div>
        @endforeach

        @endif
    </div>
</main>
<footer class="footer">
    <ul class="page-transition">
        <!-- タグ一覧リンク -->
        <li class="page-transition-btn">
            <a href="" class="link-after-login">タグで絞り込む</a>
        </li>
        <!-- アイテム登録リンク -->
        <li class="page-transition-btn">
            <a href="" class="link-after-login">アイテム登録</a>
        </li>
    </ul>
</footer>



@endsection