<x-login-layout>

 <div class="search_container">
    <form action="/search" method="post" class='search' >
      @csrf
      <input type="text" name="keyword" class="keyword" placeholder="ユーザー名">
      <button type="submit" class="search_icon" >
        <img src="/images/search.png">
      </button>
        <span class="result">検索ワード：{{ $keyword ?? '' }}</span>
    </form>
  </div>

    <ul class="search_list">
      @foreach($users as $user)
        @if($user->id !== Auth::id())
          <li class = 'search_user'>
            <img src="{{ asset('images/' . $user->icon_image) }}" class= 'search_user_icon' alt="アイコン">
            <span class="search-username">{{ $user->username}}</span>
            <form action="{{ route('toggleFollow', $user->id) }}" method="post">
              @csrf
              <button type="submit"class="btn {{ Auth::user()->isFollowing($user->id) ? 'btn-primary' : 'btn-danger' }}">
                {{ Auth::user()->isFollowing($user->id) ? 'フォロー解除' : 'フォローする' }}
              </button>
            </form>
          </li>
        @endif
      @endforeach
    </ul>


</x-login-layout>
