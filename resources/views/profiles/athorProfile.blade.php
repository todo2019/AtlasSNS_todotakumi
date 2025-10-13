<x-login-layout>
  <div class="user-card">

    <div class='other-icon'>
      <img src="{{ asset('images/' . $users->icon_image) }}" alt="アイコン" >
    </div>

    <div class='account'>
      <div class='user-label'>
        <p>ユーザー名</p>
        <p>自己紹介</p>
      </div>
      <div class='user-info'>
        <p>{{ $users->username }}</p>
        <p>{{ $users->bio }}</p>
      </div>
    </div>

    <div class='follow-btn'>
      <button type="submit"class="btn {{ Auth::user()->isFollowing($users->id) ? 'btn-primary' : 'btn-danger' }}">
        {{ Auth::user()->isFollowing($users->id) ? 'フォロー解除' : 'フォローする' }}
      </button>
    </div>
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
