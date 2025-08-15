<x-login-layout>

 <div class="container">
    <form action="/search" method="post">
      @csrf
      <input type="text" name="keyword" class="keyword" placeholder="ユーザー名">
      <button type="submit" class="search-icon" >
        <img src="/images/search.png">
      </button>
        <h1 class="result">検索ワード：{{ $keyword ?? '' }}</h1>
    </form>
  </div>

  <div class="user-list">
    <ul class="list">
      @foreach($users as $user)
      <li>
        <span class="icon">{{ $user->icon_image}}</span>
        <span class="name">{{ $user->username}}</span>
        <form action="{{ route('toggleFollow', $user->id) }}" method="post">
          @csrf
          <button type="submit">
            {{ Auth::user()->isFollowing($user->id) ? 'フォロー解除' : 'フォローする' }}
          </button>
        </form>
      </li>
      @endforeach
    </ul>

  </div>

</x-login-layout>
