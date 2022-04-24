@extends('layouts.app')

@section('content')

<!-- アプリのタイトル -->
<div class="headline">
    <h1 class="your-closet">Your Closet</h1>
</div>

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">アイテム詳細</h2>
    </div>
    <!-- 登録フォーム -->
    <div class="panel-body">
        <div class="form-after-login">
            <!-- <form method="POST" action="{{ url('create-item') }}" enctype="multipart/form-data">
                {{ csrf_field() }} -->

                <!-- アイテム名 -->
                <div class="form-group">
                    <div class="row item-photo">
                        <img class="item-img" src="{{ $item->image }}" alt="アイテム写真">
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

                        <!-- タグがない場合 -->
                        @if (count($tags) == 0)
                            <div class="message">
                                <p class="no-items-tags">タグがありません。</p>
                            </div>

                        <!-- タグがある場合 -->
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
                        <button type="button" onclick="location.href='{{ url('items') }}'"
                            class="btn btn-reverse">キャンセル</button>
                        <button type="submit" class="btn btn-primary">編集</button>
                    </div>
                </div>

            <!-- </form> -->
        </div>
    </div>
</main>
@endsection