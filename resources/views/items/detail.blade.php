@extends('layouts.app')

@section('content')

<!-- アプリのタイトル -->
<div class="headline">
    <h1 class="your-closet">Your Closet</h1>
</div>

<ul class="link">
    <li>
        <form method="POST" action="{{ route('item.destroy', $item->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="hidden" name="id" value="{{ $item->id }}">
            <button type="submit" class="btn btn-reverse">アイテムを削除</button>
        </form>
    </li>
</ul>

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">アイテム詳細</h2>
    </div>
    <!-- アイテム詳細 -->
    <div class="panel-body">
        <div class="form-after-login">

            <!-- アイテム名 -->
            <div class="form-group">
                <div class="row">
                    <img class="item-img" src="/storage/{{ $item->image }}" alt="アイテム写真">
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="message">
                        <h4>{{ $item->name }}</h4>
                    </div>
                </div>
            </div>
            <!-- タグ -->
            <div class="form-group">
                <div class="tag-box row">

                    <!-- タグ付けされていない場合 -->
                    @if (count($tags) == 0)
                    <div class="message">
                        <p class="no-items-tags">タグ付けされていません。</p>
                    </div>

                    <!-- タグ付けされている場合 -->
                    @elseif (count($tags) > 0)
                    @foreach($tags as $tag)
                    #{{ $tag->name }}
                    @endforeach
                    @endif
                </div>
            </div>

            <!-- 登録・キャンセルボタン -->
            <div class="form-group">
                <div class="row btn-group">
                    <a href="{{ route('items') }}" class="btn btn-reverse item-form">キャンセル</a>
                    <form method="GET" action="{{ route('item.edit', $item->id) }}">
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection