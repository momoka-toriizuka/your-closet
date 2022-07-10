@extends('layouts.app')

@section('content')

<!-- アプリのタイトル -->
<div class="headline">
    <h1 class="your-closet">Your Closet</h1>
</div>

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">アイテム登録</h2>
    </div>
    <!-- 登録フォーム -->
    <div class="panel-body">
        <div class="form-after-login">
            <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- アイテム名 -->
                <div class="form-group">
                    <div class="row">
                        <label for="" class="img-upload">アイテム画像を選択</label>
                    </div>
                    <div class="row">
                        <input type="file" name="item_image" class="img-upload">
                        @if($errors->has('item_image'))
                        <p class="errors">{{$errors->first('item_image')}}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <input type="text" name="item_name" class="text-box" placeholder="アイテム名  例:白T, 花柄ワンピ">
                        @if($errors->has('item_name'))
                        <p class="errors">{{$errors->first('item_name')}}</p>
                        @endif
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
                            <input type="checkbox" name="tag[]" value="{{ $tag->id }}">{{ $tag->tag_name }}
                        @endforeach
                        @endif
                    </div>
                </div>

                <!-- 登録・キャンセルボタン -->
                <div class="form-group">
                    <div class="row btn-group">
                        <a href="{{ route('items') }}" class="btn btn-reverse">キャンセル</a>
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>
@endsection