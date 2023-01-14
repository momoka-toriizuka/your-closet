@extends('layouts.app')

@section('content')

@extends('commons.header')

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">アイテム編集</h2>
    </div>
    <!-- アイテム詳細 -->
    <div class="panel-body">
        <div class="form-after-login">
            <div class="row">
                <a href="{{ route('outfit.select.store') }}" class="btn btn-reverse">アイテム選択</a>
            </div>
            <form method="POST" action="{{ route('outfit.edit', $outfit->id) }}" enctype="multipart/form-data">
                @csrf

                <!-- アイテム名 -->
                <div class="form-group">
                    <div class="row outfit-images">
                        @foreach($items as $item)
                        <img class="item-img" src="{{ asset('/storage/'.$item->image) }}" alt="アイテム写真">
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="message">
                            <h4>{{ $outfit->name }}</h4>
                        </div>
                    </div>
                </div>

                <!-- 更新・キャンセルボタン -->
                <div class="form-group">
                    <div class="row btn-group">
                        <a href="{{ route('outfit.detail', $outfit->id) }}" class="btn btn-reverse">キャンセル</a>
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

@extends('commons.footer')

@endsection