<x-login-layout>
  <div class="container_change">
    <form action="/profile" method="POST" enctype="multipart/form-data">
      @csrf

     <input type="hidden" name="id" value="{{ Auth::id() }}">

      <div class="change_form">

        <img class='my_icon' src="{{ $user->icon_image === 'icon1.png'? asset('images/' . $user->icon_image): asset('storage/' . $user->icon_image) }}" alt="ユーザーアイコン">

        <ul class="UserProfile">
          <li class='profile_name'>
            <span class='my_data'>ユーザー名</span>
            <input type="text" name="username" class='input_name' value="{{ Auth::user()->username }}">
            @error('username')
            <div class="error">{{ $message }}</div>
            @enderror
          </li>

          <li class='profile_email'>
            <span class='my_data'>メールアドレス</span>
            <input type="text" name="email" class='input_email' value="{{ Auth::user()->email }}">
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
          </li>

          <li class='profile_password'>
            <span class='my_data'>パスワード</span>
            <input type="password" name="password" class='input_password' >
            @error('password')
            <div class="error">{{ $message }}</div>
            @enderror
          </li>

          <li class='profile_confirmation'>
            <span class='my_data'>パスワード確認</span>
            <input type="password" name="password_confirmation" class='input_confirmation' >
          </li>

          <li class='profile_bio'>
            <span class='my_data'>自己紹介</span>
            <input type="text" name="bio" class='input_bio' value="{{ Auth::user()->bio }}">
            @error('bio')
            <div class="error">{{ $message }}</div>
            @enderror
          </li>

          <li class='profile_icon'>
            <span class='my_data'>アイコン画像</span>
            <input type="file" name="icon_image" class='input_icon' >
            @error('icon_image')
            <div class="error">{{ $message }}</div>
            @enderror
          </li>
        </ul>
      </div>

      <div class='btn_area'>
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
