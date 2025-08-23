<x-logout-layout>

  <div id="clear">
    <ul>
      <li class="entry-user">
        {{ session('username') }}さん
        <br>
        ようこそ！AtlasSNSへ！
      </li>

      <li class="information">
        ユーザー登録が完了しました。
        <br>
        早速ログインをしてみましょう。
      </li>

      <p class="login2"><a href="login">ログイン画面へ</a></p>
    </ul>
  </div>
</x-logout-layout>
