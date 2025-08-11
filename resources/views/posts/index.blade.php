<x-login-layout>


  <div class="container">

  <form action="/top" method="post">
    @csrf
    <input type="text" name="posts" class="posts" placeholder="投稿内容を入力してください。">
    <button type="submit" class="post-icon" >
      <img src="/images/post.png">
    </button>
  </form>
  </div>

</x-login-layout>
