@extends('layouts.app')

@section('content')

<!-- アプリのタイトル -->
<div class="headline">
    <h1 class="your-closet">Your Closet</h1>
</div>

<!-- アイテム一覧表示 -->
<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">{{ $tag->name }}</h2>
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
        <!-- アイテム一覧リンク -->
        <li class="page-transition-btn">
            <button type="button" onclick="location.href='{{ url('items') }}'" class="btn btn-link">アイテム一覧</button>
        </li>
        <!-- アイテム登録リンク -->
        <li class="page-transition-btn">
            <button type="button" onclick="location.href='{{ url('create-item') }}'" class="btn btn-link">アイテム登録</button>
        </li>
    </ul>
</footer>



@endsection