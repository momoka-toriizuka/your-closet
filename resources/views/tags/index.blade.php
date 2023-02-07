@extends('layouts.app')

@section('content')

@extends('commons.header')

<!-- タグ一覧表示 -->
<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">タグ一覧画面</h2>
    </div>

    <div class="panel-body">
        <!-- タグ登録フォーム -->
        <div class="create-tag">
            <form method="POST" action="{{ route('tag.store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="text-box" placeholder="タグ名（30字以内）" required maxlength="30">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
                <div class="form-group">
                    @if($errors->has('name'))
                    <p class="color-red errors">{{$errors->first('name')}}</p>
                    @endif
                </div>
            </form>
        </div>

        <!-- タグがない場合 -->
        @if (count($tags) == 0)
        <div class="message">
            <p class="nothing">タグがありません。</p>
        </div>

        <!-- タグがある場合 -->
        @elseif (count($tags) > 0)
        <div class="data">
            @foreach ($tags as $tag)
            <div class="tag">
                <ul class="tag-group">
                    <!-- タグ名 -->
                    <li>
                        <form action="{{ route('items-of-tag', $tag->id) }}" method="POST">
                            @csrf
                            <a href="{{ route('items-of-tag', $tag->id) }}" class="tag-name">#{{ $tag->name }}</a>

                        </form>
                    </li>
                    <ul class="tag-btn-group">
                        <!-- タグ編集画面に遷移 -->
                        <li class="icon">
                            <a href="{{ route('tag.edit', $tag->id)}}">
                                <img src="{{ asset('/pencil.png') }}" alt="">
                            </a>
                        </li>
                        <!-- タグ削除ボタン -->
                        <li class="icon">
                            <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon">
                                    <img src="{{ asset('/delete.png') }}" alt="">
                                </button>
                            </form>
                        </li>
                    </ul>
                </ul>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</main>

@extends('commons.footer')

@endsection