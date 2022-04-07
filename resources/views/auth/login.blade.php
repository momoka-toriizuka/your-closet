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
                        class="auth-text-box @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                        class="auth-text-box @error('password') is-invalid @enderror" name="password" required
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

    <!-- <div class="form-group">
        <div class="row">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>

            <label for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
    </div> -->

    <div class="form-group">
        <div class="row">
            <button type="submit" class="btn btn-primary">ログイン</button>
        </div>
    </div>
    <!-- <div class="form-group">
        <div class="row">
            @if (Route::has('password.request'))
            <a class="auth-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
    </div> -->
    </form>
    <div class="row">
        <a href="{{ route('register') }}" class="auth-link">会員登録</a>
    </div>
</div>
</div>
@endsection