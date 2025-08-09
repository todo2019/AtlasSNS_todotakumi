<x-login-layout>

 <div class="container">

  <form action="/search" method="post">
    @csrf
    <input type="text" name="keyword" class="keyword" placeholder="ユーザー名">
    <button type="submit" class="btn btn-success" >
      <img src="/images/search.png">
    </button>
  </form>
  </div>

  <div class="container">
    <ul class="list">
      @foreach($users as $user)
      <li>{{ $user->icon_image}}</li>
      <li>{{ $user->username}}</li>
      @endforeach
    </ul>
  </div>

</x-login-layout>
