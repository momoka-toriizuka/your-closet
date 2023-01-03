@extends('layouts.app')

@section('content')

@extends('commons.header')

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
                <img class="item-img" type="image" src="{{ asset('/storage/'.$item->image) }}" alt="{{ $item->name }}">
            </a>
        </div>
        @endforeach
        <div class="ditch"></div>
        @endif
    </div>

    <!-- アイテム登録画面リンク -->
    <div class="add-btn">
        <a href="">
            <img class="icon" src="{{ asset('/storage/plus.png') }}" alt="">
        </a>
    </div>
    
</main>

@extends('commons.footer')

@endsection