@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact__content">
  <div class="contact__heading">
    <h2>Contact</h2>
      </div>
      <form class="form" action="{{ route('contact.confirm') }}" method="POST">
				@csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="first_name" placeholder="例: 山田"/>
							<input type="text" name="last_name" placeholder="例: 太郎"/>
            </div>
            <div class="form__error">
              @error('first_name')
              {{ $message }}
              @enderror
              @error('last_name')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
				<div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
							<input type="radio" id="male" name="gender" value="男性" checked>
							<label for="male">男性</label>
							<input type="radio" id="female" name="gender" value="女性">
							<label for="female">女性</label>
							<input type="radio" id="other" name="gender" value="その他">
							<label for="other">その他</label>
            </div>
            <div class="form__error">
            @error('gender')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" placeholder="test@example.com" />
            </div>
            <div class="form__error">
            @error('email')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
						<input type="tel" name="tel" placeholder="08012345678">
            </div>
            <div class="form__error">
            @error('tel')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
				<div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
						<span class="form__label--required">※</span>
						<div class="form__input--text">
						<input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3"/>
            </div>
						<div class="form__error">
              @error('address')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
				<div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
						<div class="form__input--text">
							<input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101"></input>
            </div>
						<div class="form__error">
              @error('building')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
              <span class="form__label--item">お問い合わせの種類</span>
              <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="detail" placeholder="選択してください"></textarea>
            </div>
            <div class="form__error">
              @error('detail')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
						<span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="content" placeholder="お問い合わせ内容を入力してください"></textarea>
            </div>
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>
