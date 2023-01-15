@extends('layouts.app')

@section('content')

@extends('commons.header')

<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">アイテム編集</h2>
    </div>
    <!-- アイテム編集 -->
    <div class="panel-body">
        <div class="form-after-login">
            <div class="row">
                <a href="{{ route('outfit.select.update', $outfit->id) }}" class="btn btn-reverse">アイテム選択</a>
            </div>
            <form method="POST" action="{{ route('outfit.update', $outfit->id) }}" enctype="multipart/form-data">
                @csrf

                <!-- アイテム名 -->
                <div class="form-group">
                    <div class="row outfit-images">
                        <!-- アイテムが選択されていない場合 -->
                        @if (empty($selected_items))
                        <div class="message">
                            <p class="no-items-tags">コーディネートに追加するアイテムを、選択してください。</p>
                            @if($errors->has('item'))
                            <p class="errors">{{$errors->first('item')}}</p>
                            @endif
                        </div>

                        <!-- アイテムが選択されている場合、チェックされたアイテムの画像を表示 -->
                        @elseif (!empty($selected_items))
                        @foreach($items as $item)
                        @if (in_array($item->id, $selected_items))
                        <img class="item-img" src="{{ asset('/storage/'.$item->image) }}" alt="アイテム写真">
                        <input type="hidden" name="item[]" value="{{ $item->id }}">
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <input type="text" name="name" class="text-box" placeholder="コーディネート名（任意）  例:黒ワントーンコーデ（カジュアル）">
                        @if($errors->has('name'))
                        <p class="errors">{{$errors->first('name')}}</p>
                        @endif
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