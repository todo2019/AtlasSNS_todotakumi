<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => 'login']) !!}

  <div class="login_screen">
    <p class='welcome'>AtlasSNSへようこそ</p>

    <ul >
      <li class="input_item">
        {{ Form::label('メールアドレス') }}
        {{ Form::text('email',null,['class' => 'input']) }}
        {{ Form::label('パスワード') }}
        {{ Form::password('password',['class' => 'input']) }}
      </li>
      <li class='btn_area'>
        {{ Form::submit('ログイン',['class'=>'login_btn']) }}
      </li>

      <p class="register"><a href="register">新規ユーザーの方はこちら</a></p>

      {!! Form::close() !!}
    </ul>
  </div>

</x-logout-layout>
