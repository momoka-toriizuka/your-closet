@extends('layouts.app')

@section('content')

<!-- アプリのタイトル -->
<div class="headline">
    <h1 class="your-closet">Your Closet</h1>
</div>

<!-- ユーザー認証メニュー -->
<ul class="link">
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
        <!-- href="{{ route('logout') }}" -->
        <button class="btn btn-link" onclick="location.href='{{ route('logout') }}'; event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            ログアウト
        </button>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </li>
    @endguest
</ul>

<!-- アイテム一覧表示 -->
<main class="panel">
    <!-- ページタイトル -->
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
            <img src="{{ $item->image }}" alt="アイテム写真">
        </div>
        @endforeach

        @endif
    </div>
</main>
<footer class="footer">
    <ul class="page-transition">
        <!-- タグ一覧リンク -->
        <li class="page-transition-btn">
            <button type="button" onclick="location.href='{{ url('tags') }}'" class="btn btn-link">タグで絞り込む</button>
        </li>
        <!-- アイテム登録リンク -->
        <li class="page-transition-btn">
            <button type="button" onclick="location.href='{{ url('createitem') }}'" class="btn btn-link">アイテム登録</button>
        </li>
    </ul>
</footer>



@endsection