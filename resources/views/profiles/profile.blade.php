<x-login-layout>
  <div class="container-change">
    <form action="/profile" method="POST" enctype="multipart/form-data">
      @csrf

     <input type="hidden" name="id" value="{{ Auth::id() }}">

     <img  class='my-icon' src="{{ asset('images/' . Auth::user()->icon_image) }}" alt="ユーザーアイコン" >

     <ul class="UserProfile">
        <li class='profile-name'>
            <p class='my-data'>ユーザー名</p>
            <input type="text" name="username" class='input-name' value="{{ Auth::user()->username }}">
        </li>

        <li class='profile-email'>
          <p class='my-data'>メールアドレス</p>
          <input type="text" name="email" class='input-email' value="{{ Auth::user()->email }}">
        </li>

        <li class='profile-password'>
          <p class='my-data'>パスワード</p>
          <input type="password" name="password" class='input-password' >
        </li>

        <li class='profile-confirmation'>
          <p class='my-data'>パスワード確認</p>
          <input type="password" name="password_confirmation" class='input-confirmation' >
        </li>

        <li class='profile-bio'>
          <p class='my-data'>自己紹介</p>
          <input type="text" name="bio" class='input-bio' value="{{ Auth::user()->bio }}">
        </li>

        <li class='profile-icon'>
          <p class='my-data'>アイコン画像</p>
          <input type="file" name="icon_image" class='input-icon' >
        </li>

      </ul>

      <button type="submit" class="btn-success" >更新</button>

      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

    </form>
  </div>
</x-login-layout>
