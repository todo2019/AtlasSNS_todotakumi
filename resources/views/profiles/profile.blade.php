<x-login-layout>
  <div class="container-change">
    <form action="/profile" method="POST" enctype="multipart/form-data">
      @csrf

     <input type="hidden" name="id" value="{{ Auth::id() }}">

      <div class="change-form">

        <img  class='my-icon' src="{{ asset('images/' . Auth::user()->icon_image) }}" alt="ユーザーアイコン" >

        <ul class="UserProfile">
          <li class='profile-name'>
            <span class='my-data'>ユーザー名</span>
            <input type="text" name="username" class='input-name' value="{{ Auth::user()->username }}">
          </li>

          <li class='profile-email'>
            <span class='my-data'>メールアドレス</span>
            <input type="text" name="email" class='input-email' value="{{ Auth::user()->email }}">
          </li>

          <li class='profile-password'>
            <span class='my-data'>パスワード</span>
            <input type="password" name="password" class='input-password' >
          </li>

          <li class='profile-confirmation'>
            <span class='my-data'>パスワード確認</span>
            <input type="password" name="password_confirmation" class='input-confirmation' >
          </li>

          <li class='profile-bio'>
            <span class='my-data'>自己紹介</span>
            <input type="text" name="bio" class='input-bio' value="{{ Auth::user()->bio }}">
          </li>

          <li class='profile-icon'>
            <span class='my-data'>アイコン画像</span>
            <input type="file" name="icon_image" class='input-icon' >
          </li>
        </ul>
      </div>

      <div class='btn-area'>
        <button type="submit" class="btn-success" >更新</button>
      </div>

      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

    </form>
  </div>
</x-login-layout>
