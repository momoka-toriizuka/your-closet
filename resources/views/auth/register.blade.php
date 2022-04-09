@extends('layouts.app')

@section('content')
<div class="before-login">
    <div class="app-title">
        <h1 class="your-closet">Your Closet</h1>
    </div>
    <div class="auth-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- 名前入力 -->
            <div class="form-group">
                <div class="row">
                    <input id="name" type="text" placeholder="名前"
                        class="text-box @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                        required autocomplete="name" autofocus>
                </div>
                <div class="row">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- メールアドレス入力 -->
            <div class="form-group">
                <div class="row">
                    <input id="email" type="email" placeholder="メールアドレス"
                        class="text-box @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">
                </div>
                <div class="row">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- パスワード入力 -->
            <div class="form-group">
                <div class="row">
                    <input id="password" type="password" placeholder="パスワード"
                        class="text-box @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">
                </div>
                <div class="row">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <input id="password-confirm" type="password" placeholder="パスワード再入力" class="text-box"
                        name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <button type="submit" class="btn btn-primary">会員登録</button>
                </div>
            </div>
        </form>
        <div class="row">
            <a href="{{ route('login') }}" class="auth-link">ログイン</a>
        </div>
    </div>
</div>
@endsection