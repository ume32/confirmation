@extends('layouts.app')

@section('content')
<nav class="header__nav">
  @guest
  <a href="{{ route('login') }}" class="header__button">ログイン</a>
  @if (Route::currentRouteName() !== 'register')
  <a href="{{ route('register') }}" class="header__button">登録</a>
  @endif
  @else
  <a href="{{ route('login') }}" class="header__button">マイページ</a>
  <form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="header__button">ログアウト</button>
  </form>
  @endguest
</nav>
<div class="login-form__content">
  <div class="login-form__heading">
    <h2>Login</h2>
  </div>
  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form__group">
      <div class="form__group-title">
        <label for="email">メールアドレス</label>
      </div>
      <div class="form__group-content">
        <input id="email" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" required autofocus>
        @error('email')
          <div class="form__error">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <label for="password">パスワード</label>
      </div>
      <div class="form__group-content">
        <input id="password" type="password" name="password" placeholder="例: coachtech1106" required>
        @error('password')
          <div class="form__error">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="form__button">
      <button type="submit" class="form__button-submit">ログイン</button>
    </div>
  </form>
</div>
@endsection
