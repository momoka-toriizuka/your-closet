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
        <div class="create-item">
            <form method="POST" action="{{ url('createitem') }}" enctype=“multipart/form-data”>
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
                        <input type="text" name="name" class="text-box" placeholder="アイテム名  例:白T, 花柄ワンピ">
                    </div>
                </div>
                <!-- タグ -->
                <div class="form-group">
                    <div class="row">
                        <input type="text" name="tag" class="text-box" placeholder="タグ名（既存のタグを入力）">
                    </div>
                </div>

                <!-- 登録・キャンセルボタン -->
                <div class="form-group">
                    <div class="row btn-group">
                        <button type="button" onclick="location.href='{{ url('items') }}'" class="btn btn-reverse">キャンセル</button>
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>
@endsection