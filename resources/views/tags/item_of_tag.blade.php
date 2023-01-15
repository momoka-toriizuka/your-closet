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
            <p class="nothing">アイテムがありません。</p>
        </div>

        <!-- アイテムがある場合 -->
        @elseif (count($items) > 0)
        <div class="data">
        @foreach ($items as $item)
            <a href="{{ route('item.detail', $item->id) }}">
                <img class="item-img item-img-index" type="image" src="{{ asset('/storage/'.$item->image) }}" alt="{{ $item->name }}">
            </a>
        @endforeach
        </div>
        @endif
    </div>
    
</main>

@extends('commons.footer')

@endsection