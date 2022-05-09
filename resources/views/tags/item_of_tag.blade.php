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
            <a href="{{ route('item.detail', $item->id) }}">
                <img class="item-img" type="image" src="/storage/{{ $item->image }}" alt="{{ $item->name }}">
            </a>
        </div>
        @endforeach

        @endif
    </div>
</main>
<footer class="footer">
    <ul class="page-transition">
        <!-- タグ一覧リンク -->
        <li class="page-transition-btn">
            <a href="{{ route('tags') }}" class="btn btn-link">タグで絞り込む</a>
        </li>
        <!-- アイテム一覧リンク -->
        <li class="page-transition-btn">
            <a href="{{ route('items') }}" class="btn btn-link">アイテム一覧</a>
        </li>
        <!-- アイテム登録リンク -->
        <li class="page-transition-btn">
            <a href="{{ route('item.create') }}" class="btn btn-link">アイテム登録</a>
        </li>
    </ul>
</footer>



@endsection