@extends('layouts.app')

@section('content')

@extends('commons.header')

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">アイテム編集</h2>
    </div>
    <!-- 編集フォーム -->
    <div class="panel-body">
        <div class="form-after-login">
            <form method="POST" action="{{ route('item.update', $item->id) }}" enctype="multipart/form-data">
                @csrf

                <!-- アイテム名 -->
                <div class="form-group">
                    <label for="" class="img-upload">アイテム画像を選択</label>
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="img-upload">
                    @if($errors->has('image'))
                    <p class="errors">{{$errors->first('image')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="text-box" value="{{ $item->name }}">
                    @if($errors->has('name'))
                    <p class="errors">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <!-- タグ -->
                <div class="form-group">
                    <div class="tag-box">

                        <!-- タグがない場合 -->
                        @if (count($tags) == 0)
                        <div class="message">
                            <p class="nothing">タグがありません。</p>
                        </div>

                        <!-- タグがある場合 -->
                        @elseif (count($tags) > 0)
                        @foreach($tags as $tag)
                        <input type="checkbox" name="tag[]" value="{{ $tag->id }}" <?= (in_array($tag->id, $checked_tags) ? 'checked' : '') ?>>{{ $tag->name }}
                        @endforeach
                        @endif
                    </div>
                </div>

                <!-- 更新・キャンセルボタン -->
                <div class="form-group">
                    <div class="btn-group">
                        <a href="{{ route('item.detail', $item->id) }}" class="btn btn-reverse">キャンセル</a>
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>

@extends('commons.footer')

@endsection