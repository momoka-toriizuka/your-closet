@extends('layouts.app')

@section('content')

@extends('commons.header')

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">タグ編集</h2>
    </div>
    <!-- タグ編集フォーム -->
    <div class="panel-body">
        <div class="form-after-login">
            <form method="POST" action="{{ route('tag.update',$tag->id) }}" enctype="multipart/form-data">
                @csrf

                <!-- タグ名 -->
                <div class="form-group">
                    <input type="text" name="name" class="text-box" value="{{ $tag->name }}" required max="100">
                    @if($errors->has('name'))
                    <p class="errors">{{$errors->first('name')}}</p>
                    @endif
                </div>

                <!-- 更新・キャンセルボタン -->
                <div class="form-group">
                    <div class="btn-group">
                        <a href="{{ route('tags') }}" class="btn btn-reverse">キャンセル</a>
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>

@extends('commons.footer')

@endsection