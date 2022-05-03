@extends('layouts.app')

@section('content')

<!-- アプリのタイトル -->
<div class="headline">
    <h1 class="your-closet">Your Closet</h1>
</div>

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">タグ編集</h2>
    </div>
    <!-- タグ編集フォーム -->
    <div class="panel-body">
        <div class="form-after-login">
            <form method="POST" action="{{ url('update-tag/'.$tag->id) }}" enctype=“multipart/form-data”>
                {{ csrf_field() }}

                <!-- タグ名 -->
                <div class="form-group">
                    <div class="row">
                        <input type="text" name="name" class="text-box" value="{{ $tag->name }}">
                    </div>
                </div>

                <!-- 更新・キャンセルボタン -->
                <div class="form-group">
                    <div class="row btn-group">
                        <button type="button" onclick="location.href='{{ url('tags') }}'"
                            class="btn btn-reverse">キャンセル</button>
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>

@endsection