<x-login-layout>

 <div class="container">

  <form action="/top" method="post">
    @csrf
    <input type="text" name="posts" class="posts" placeholder="ユーザー名">
    <button type="submit" class="btn btn-success" >
      <img src="/images/search.png">
    </button>
  </form>
  </div>

</x-login-layout>
