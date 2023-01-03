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

                <!-- アイテム名 -->
                <div class="form-group">
                    <div class="row">
                        <label for="" class="img-upload">コーディネートに追加するアイテムを選択</label>
                    </div>
                    <div class="row">
                        <!-- TODO:アイテム写真を見て登録できるようにする -->
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

                <!-- 登録・キャンセルボタン -->
                <div class="form-group">
                    <div class="row btn-group">
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