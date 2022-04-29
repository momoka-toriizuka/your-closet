@extends('layouts.app')

@section('content')

<!-- アプリのタイトル -->
<div class="headline">
    <h1 class="your-closet">Your Closet</h1>
</div>

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">アイテム編集</h2>
    </div>
    <!-- 登録フォーム -->
    <div class="panel-body">
        <div class="form-after-login">
            <form method="POST" action="{{ url('update-item/'.$item->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <!-- アイテム名 -->
                <div class="form-group">
                    <div class="row">
                        <label for="" class="img-upload">アイテム画像を選択</label>
                    </div>
                    <div class="row">
                        <input type="file" name="image" class="img-upload">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <input type="text" name="name" class="text-box" value="{{ $item->name }}">
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
                            <input type="checkbox" name="tag[]" value="{{ $tag->id }}"<?= ( in_array($tag->id, $checked_tags) ? 'checked' : '' ) ?>>{{ $tag->name }}
                        @endforeach
                        @endif
                    </div>
                </div>

                <!-- 登録・キャンセルボタン -->
                <div class="form-group">
                    <div class="row btn-group">
                        <button type="button" onclick="location.href='{{ url('item-detail/'.$item->id) }}'"
                            class="btn btn-reverse">キャンセル</button>
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>
@endsection