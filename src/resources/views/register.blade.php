<!-- resources/views/register.blade.php -->
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

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
<div class="register-container">
  <h2 class="register-title">Register</h2>
  <form action="{{ route('register') }}" method="POST" class="register-form">
    @csrf
    <!-- 名前 -->
    <div class="form-group">
      <label for="name">お名前</label>
      <input type="text" name="name" id="name" placeholder="例: 山田  太郎" value="{{ old('name') }}">
      @error('name')
      <div class="form-error">{{ $message }}</div>
      @enderror
    </div>
    <!-- メールアドレス -->
    <div class="form-group">
      <label for="email">メールアドレス</label>
      <input type="email" name="email" id="email" placeholder="例: test@example.com" value="{{ old('email') }}">
      @error('email')
      <div class="form-error">{{ $message }}</div>
      @enderror
    </div>
    <!-- パスワード -->
    <div class="form-group">
      <label for="password">パスワード</label>
      <input type="password" name="password" id="password" placeholder="例: coachtec1106">
      @error('password')
      <div class="form-error">{{ $message }}</div>
      @enderror
    </div>
    <!-- 登録ボタン -->
    <div class="form-button">
      <button type="submit" class="register-button">登録</button>
    </div>
  </form>
</div>
@endsection
