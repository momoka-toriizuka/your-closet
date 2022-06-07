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
        <h2 class="current-page">タグをクリック/タップしてアイテム絞り込み</h2>
    </div>

    <div class="panel-body">
        <!-- タグ登録フォーム -->
        <div class="create-tag">
            <form method="POST" action="{{ route('tag.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <input type="text" name="tag_name" class="text-box" placeholder="タグ名  例:カジュアル, 夏物">
                        @if($errors->has('tag_name'))
                        <p class="errors">{{$errors->first('tag_name')}}</p>
                        @endif
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
                    <form action="{{ route('items-of-tag', $tag->id) }}" method="POST">
                        {{ csrf_field() }}
                        <a href="{{ route('items-of-tag', $tag->id) }}" class="tag">{{ $tag->tag_name }}</a>
                        
                    </form>
                </li>
                <ul class="tag-btn-group">
                    <!-- タグ編集画面に遷移 -->
                    <li>
                        <form action="{{ route('tag.edit', $tag->id)}}" method="GET">
                            {{ csrf_field() }}
                            <button type="submit" class="btn tag-btn-reverse">編集</button>
                        </form>
                    </li>
                    <!-- タグ削除ボタン -->
                    <li>
                        <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-primary">削除</button>
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
            <a href="{{ route('items') }}" class="btn btn-link">アイテム一覧</a>
        </li>
    </ul>
</footer>
@endsection