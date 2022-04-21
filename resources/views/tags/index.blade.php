@extends('layouts.app')

@section('content')

<!-- アプリのタイトル -->
<div class="headline">
    <h1 class="your-closet">Your Closet</h1>
</div>

<!-- タグ一覧表示 -->
<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">すべてのタグ</h2>
    </div>

    <div class="panel-body">
        <!-- タグ登録フォーム -->
        <div class="create-tag">
            <form method="POST" action="{{ url('create-tag') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <input type="text" name="name" class="text-box" placeholder="タグ名  例:カジュアル, 夏物">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- タグがない場合 -->
        @if (count($tags) == 0)
        <div class="message">
            <p class="no-items-tags">タグがありません。</p>
        </div>

        <!-- タグがある場合 -->
        @elseif (count($tags) > 0)
        @foreach ($tags as $tag)
        <div class="tags">
            <ul class="tag-group">
                <!-- タグ名 -->
                <li>
                    <form action="{{ url('items-of-tag/'.$tag->id) }}" method="POST">
                        {{ csrf_field() }}
                        <a href="{{ url('items-of-tag/'.$tag->id) }}" class="tag">{{ $tag->name }}</a>
                        
                    </form>
                </li>
                <ul class="tag-btn-group">
                    <!-- タグ編集画面に遷移 -->
                    <li>
                        <form action="{{ url('update-tag-form/'.$tag->id) }}" method="GET">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-reverse" id="update-tag-{{ $tag->id }}">編集</button>
                        </form>
                    </li>
                    <!-- タグ削除ボタン -->
                    <li>
                        <form action="{{ url('delete-tag/'.$tag->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-primary" id="delete-tag-{{ $tag->id }}">削除</button>
                        </form>
                    </li>
                </ul>
            </ul>
        </div>
        @endforeach

        @endif
    </div>
</main>
<footer class="footer">
    <!-- アイテム一覧リンク -->
    <ul class="page-transition">
        <li class="page-transition-btn">
            <button type="button" onclick="location.href='{{ url('items') }}'" class="btn btn-link">アイテム一覧</button>
        </li>
    </ul>
</footer>



@endsection