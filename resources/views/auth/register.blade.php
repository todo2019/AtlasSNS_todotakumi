<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => 'register']) !!}

  <div class='register-screen'>
    <p class='entry'>新規ユーザー登録</p>


    <ul class="register-form">
      <li class="register-item">
        {{ Form::label('ユーザー名') }}
        {{ Form::text('username',null,['class' => 'input']) }}

        {{ Form::label('メールアドレス') }}
        {{ Form::email('email',null,['class' => 'input']) }}

        {{ Form::label('パスワード') }}
        {{ Form::text('password',null,['class' => 'input']) }}

        {{ Form::label('パスワード確認') }}
        {{ Form::text('password_confirmation',null,['class' => 'input']) }}
      </li>
      <li class="btn-area2">
        {{ Form::submit('新規登録',['class'=>'register-btn']) }}
      </li>

      <p class='login'><a href="login">ログイン画面へ戻る</a></p>

      {!! Form::close() !!}
    </ul>
  </div>


</x-logout-layout>
