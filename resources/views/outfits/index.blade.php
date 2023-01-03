@extends('layouts.app')

@section('content')

@extends('commons.header')

<!-- コーディネート一覧表示 -->
<main class="panel">
    <!-- ページタイトル -->
    <div class="panel-headline">
        <h2 class="current-page">すべてのコーディネート</h2>
    </div>

    <div class="panel-body">
        <!-- コーディネートがない場合 -->
        @if (count($outfits) == 0)
        <div class="message">
            <p class="no-items-tags">コーディネートがありません。</p>
        </div>

        <!-- コーディネートがある場合 -->
        @elseif (count($outfits) > 0)
        @foreach ($outfits as $outfit)
        <!-- TODO:画像サイズの調整 -->
        <div class="item-photo">
                <img class="item-img" type="image" src="" alt="{{ $outfit->outfit_name }}">
        </div>
        @endforeach
        <div class="ditch"></div>
        @endif
    </div>
    
    <!-- コーディネート登録画面リンク -->
    <div class="add-btn">
        <a href="{{ route('outfit.create') }}">
            <img class="icon" src="{{ asset('/storage/plus.png') }}" alt="">
        </a>
    </div>

</main>

@extends('commons.footer')

@endsection