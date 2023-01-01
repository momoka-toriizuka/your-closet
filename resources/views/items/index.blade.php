@extends('layouts.app')

@section('content')

@extends('commons.header')

<!-- ユーザー認証メニュー -->
<ul class="link">
    @guest
    @if (Route::has('login'))
    <li>
        <a class="btn btn-link" href="{{ route('login') }}">ログイン</a>
    </li>
    @endif

    @if (Route::has('register'))
    <li>
        <a class="btn btn-link" href="{{ route('register') }}">会員登録</a>
    </li>
    @endif
    @else
    <li>
        <a class="btn btn-link" href="{{ route('logout') }}">ログアウト</a>
            @csrf
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
            <a href="{{ route('item.detail', $item->id) }}">
                <img class="item-img" type="image" src="{{ asset('/storage/'.$item->item_image) }}" alt="{{ $item->item_name }}">
            </a>
        </div>
        @endforeach
        <div class="ditch"></div>
        @endif
    </div>
</main>

@extends('commons.footer')

@endsection