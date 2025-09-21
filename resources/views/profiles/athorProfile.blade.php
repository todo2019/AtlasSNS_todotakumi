<x-login-layout>
  <div class="user-card">
    <img class='user-icon' src="{{ asset('images/' . $users->icon_image) }}" alt="アイコン" >
    <div class='user-name'>
      <h2>ユーザー名</h2>
      <h2>{{ $users->username }}</h2>
    </div>
    <div class='user-bio'>
      <p>自己紹介</p>
      <p>{{ $users->bio }}</p>
    </div>

    <form method="POST" action="{{ Auth::user()->isFollowing($users->id) ? route('unfollow', $users) : route('follow', $users) }}">
        @csrf
        <button type="submit" class='follow-btn'>
            {{ Auth::user()->isFollowing($users->id) ? 'フォロー解除' : 'フォローする' }}
        </button>
    </form>
  </div>

  <ul class='post-list'>
    @foreach($posts as $post)
      <li class='post-result'>
        <div class='user-post'>
          <img src="{{ asset('images/' . $users->icon_image) }}" alt="アイコン">

          <div class='user-data'>
            <p>{{ $post->user->username }}</p>
            <p>{{ $post->post }}</p>
          </div>
        </div>
          <p class='update-at'>{{ $post->updated_at }}</p>
      </li>
    @endforeach
  </ul>
</x-login-layout>
