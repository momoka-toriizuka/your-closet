@extends('layouts.app')

@section('content')

@extends('commons.header')

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">アイテム選択</h2>
    </div>

    <!-- アイテムを取得して写真を表示 -->

    <!-- アイテムがない場合 -->
    @if (count($items) == 0)
    <div class="message">
        <p class="nothing">アイテムがないため、コーディネートを登録できません。</p>
    </div>

    <!-- アイテムがある場合 -->
    @elseif (count($items) > 0)
    <form action="{{ route('outfit.set.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="data">
            @foreach ($items as $item)
            <a class="select-items" href="{{ route('item.detail', $item->id) }}">
                <input class="checkbox checkbox-select-items" type="checkbox" name="item[]" value="{{ $item->id }}">
                <img class="item-img item-img-index" type="image" src="{{ asset('/storage/'.$item->image) }}" alt="{{ $item->name }}">
            </a>
            @endforeach
        </div>

        <!-- 選択したアイテムを登録フォームに渡す -->
        <div class="form-group">
            <div class="btn-group">
                <a href="{{ route('outfit.create') }}" class="btn btn-reverse">キャンセル</a>
                <button type="submit" class="btn btn-primary">決定</button>
            </div>
            @if($errors->has('item'))
            <p class="color-red errors">{{$errors->first('item')}}</p>
            @endif
        </div>

    </form>
    @endif

</main>

@endsection