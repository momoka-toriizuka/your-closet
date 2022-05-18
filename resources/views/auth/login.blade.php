@extends('layouts.app')

@section('content')
<div class="before-login">
    <div class="app-title">
        <h1 class="your-closet">Your Closet</h1>
    </div>
    <div class="auth-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- メールアドレス入力 -->
            <div class="form-group">
                <div class="row">
                    <input id="email" type="email" placeholder="メールアドレス"
                        class="text-box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus>
                </div>
                @error('email')
                <div class="row">
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </div>
                @enderror
            </div>
            <!-- パスワード入力 -->
            <div class="form-group">
                <div class="row">
                    <input id="password" type="password" placeholder="パスワード"
                        class="text-box @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">
                </div>

                <div class="row">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
    </div>
    <!-- ログインボタン -->
    <div class="form-group">
        <div class="row">
            <button type="submit" class="btn btn-primary">ログイン</button>
        </div>
    </div>
    </form>
    <!-- 会員登録画面へ遷移 -->
    <div class="row">
        <a href="{{ route('register') }}" class="auth-link">会員登録</a>
    </div>
</div>
</div>
@endsection