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
        <form action="{{ route('item.detail', $item->id) }}" method="GET">
            <div class="item-photo">
                <input class="item-img" type="image" src="/storage/{{ $item->image }}" onclick="location.href='{{ route('item.detail', $item->id) }}'" alt="{{ $item->name }}">
            </div>
        </form>
        @endforeach

        @endif
    </div>
</main>
<footer class="footer">
    <ul class="page-transition">
        <!-- タグ一覧リンク -->
        <li class="page-transition-btn">
            <button type="button" onclick="location.href='{{ route('tags') }}'" class="btn btn-link">タグで絞り込む</button>
        </li>
        <!-- アイテム一覧リンク -->
        <li class="page-transition-btn">
            <button type="button" onclick="location.href='{{ route('items') }}'" class="btn btn-link">アイテム一覧</button>
        </li>
        <!-- アイテム登録リンク -->
        <li class="page-transition-btn">
            <button type="button" onclick="location.href='{{ route('item.edit', $item->id) }}'" class="btn btn-link">アイテム登録</button>
        </li>
    </ul>
</footer>



@endsection