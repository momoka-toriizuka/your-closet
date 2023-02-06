@extends('layouts.app')

@section('content')

@extends('commons.header')

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">コーディネート登録</h2>
    </div>
    <!-- 登録フォーム -->
    <div class="panel-body">
        <div class="form-after-login">
            <form method="POST" action="{{ route('outfit.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- コーディネート名 -->
                <div class="form-group outfit-img-box">
                    <div class="outfit-images">

                        <!-- アイテムが選択されていない場合 -->
                        @if (empty($selected_items))
                        <div class="message">
                            <p class="nothing">コーディネートに追加するアイテムを、選択してください。</p>
                            @if($errors->has('item'))
                            <p class="color-red">{{$errors->first('item')}}</p>
                            @endif
                        </div>

                        <!-- アイテムが選択されている場合、チェックされたアイテムの画像を表示 -->
                        @elseif (!empty($selected_items))
                        @foreach($items as $item)
                        @if (in_array($item->id, $selected_items))
                        <img class="item-img outfit-img-set" src="{{ asset('/storage/'.$item->image) }}" alt="アイテム写真">
                        <input type="hidden" name="item[]" value="{{ $item->id }}">
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>

                <!-- コーディネートに紐づけるアイテムを選択 -->
                <div class="form-group">
                    <a href="{{ route('outfit.select.store') }}" class="btn btn-reverse btn-select-items">アイテム選択</a>
                </div>

                <!-- コーディネート名入力 -->
                <div class="form-group">
                    <input type="text" name="name" class="text-box" placeholder="コーディネート名（任意）" maxlength="100">
                    @if($errors->has('name'))
                    <p class="color-red">{{$errors->first('name')}}</p>
                    @endif
                </div>

                <!-- 登録・キャンセルボタン -->
                <div class="form-group">
                    <div class="btn-group">
                        <a href="{{ route('outfits') }}" class="btn btn-reverse">キャンセル</a>
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>

@extends('commons.footer')

@endsection