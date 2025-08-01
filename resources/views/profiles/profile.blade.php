<x-login-layout>

  <form action="/update" method="POST" enctype="multipart/form-data">
    @csrf

   <ul class="UserProfile">
      <li>ユーザー名<input type="text" name="username" value="{{ Auth::user()->username }}"></li>

      <li>メールアドレス<input type="text" name="mail" value="{{ Auth::user()->email }}"></li>

      <li>パスワード<input type="password" name="password" value="{{ Auth::user()->password }}"></li>

      <li>パスワード確認<input type="password" name="password_confirmation" value="{{ Auth::user()->password }}"></li>

      <li>自己紹介<input type="text" name="bio" value="{{ Auth::user()->bio }}"></li>

      <li>アイコン画像<input type="file" name="image"></li>

    </ul>

    <button type="submit" class="btn btn-success" >
      {{ __('更新') }}
    </button>

</form>
</x-login-layout>
