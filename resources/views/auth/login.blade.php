<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => 'login']) !!}

  <div class="login-screen">
    <p class='welcome'>AtlasSNSへようこそ</p>

    <ul class="login-form">
      <li class="input-item">
        {{ Form::label('メールアドレス') }}
        {{ Form::text('email',null,['class' => 'input']) }}
        {{ Form::label('パスワード') }}
        {{ Form::password('password',['class' => 'input']) }}
      </li>
      <li class='btn-area'>
        {{ Form::submit('ログイン',['class'=>'login-btn']) }}
      </li>

      <p class="register"><a href="register">新規ユーザーの方はこちら</a></p>

      {!! Form::close() !!}
    </ul>
  </div>

</x-logout-layout>
