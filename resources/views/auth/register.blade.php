<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => 'register']) !!}

  <div class='register_screen'>
    <p class='entry'>新規ユーザー登録</p>


    <ul>
      <li class="register_item">
        {{ Form::label('ユーザー名') }}
        {{ Form::text('username',null,['class' => 'input']) }}
          @error('username')
            <div class="error">{{ $message }}</div>
          @enderror

        {{ Form::label('メールアドレス') }}
        {{ Form::email('email',null,['class' => 'input']) }}
          @error('email')
            <div class="error">{{ $message }}</div>
          @enderror

        {{ Form::label('パスワード') }}
        {{ Form::text('password',null,['class' => 'input']) }}
          @error('password')
            <div class="error">{{ $message }}</div>
          @enderror

        {{ Form::label('パスワード確認') }}
        {{ Form::text('password_confirmation',null,['class' => 'input']) }}
      </li>
      <li class="btn_area">
        {{ Form::submit('新規登録',['class'=>'register_btn']) }}
      </li>

      <p class='login'><a href="login">ログイン画面へ戻る</a></p>

      {!! Form::close() !!}
    </ul>
  </div>


</x-logout-layout>
