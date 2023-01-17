@extends('layouts.app')

@section('content')

@extends('commons.header')

<!-- コーディネート削除ボタン -->
<div class="delete-btn">
    <form method="POST" action="{{ route('outfit.destroy', $outfit->id) }}" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{ $outfit->id }}">
        <button type="submit" class="icon btn-icon">
            <img src="{{ asset('/storage/delete.png') }}" alt="">
        </button>
    </form>
</div>

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">コーディネート詳細</h2>
    </div>
    <!-- アイテム詳細 -->
    <div class="panel-body">
        <div class="form-after-login">

            <!-- アイテム名 -->
            <div class="form-group">
                <div class="outfit-images">
                    @foreach($items as $item)
                    <img class="item-img" src="{{ asset('/storage/'.$item->image) }}" alt="アイテム写真">
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <div class="message">
                    <h4>{{ $outfit->name }}</h4>
                </div>
            </div>

            <!-- 編集・キャンセルボタン -->
            <div class="form-group">
                <div class="btn-group">
                    <a href="{{ route('outfits') }}" class="btn btn-reverse">キャンセル</a>
                    <form method="GET" action="{{ route('outfit.edit', $outfit->id) }}">
                        <input type="hidden" name="id" value="{{ $outfit->id }}">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>

@extends('commons.footer')

@endsection