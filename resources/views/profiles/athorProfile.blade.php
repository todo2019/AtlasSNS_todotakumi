<x-login-layout>
  <div class="user_card">

    <div class='athor_icon'>
      <img src="{{ asset('images/' . $users->icon_image) }}" alt="アイコン" >
    </div>

    <div class='account'>
      <div>
        <p>ユーザー名</p>
        <p>自己紹介</p>
      </div>
      <div>
        <p>{{ $users->username }}</p>
        <p>{{ $users->bio }}</p>
      </div>
    </div>

    <div class='follow_btn'>
      <form action="{{ route('toggleFollow', $users->id) }}" method="post">
        @csrf
        <button type="submit"class="btn {{ Auth::user()->isFollowing($users->id) ? 'btn-primary' : 'btn-danger' }}">
          {{ Auth::user()->isFollowing($users->id) ? 'フォロー解除' : 'フォローする' }}
        </button>
      </form>
    </div>
  </div>

  <ul class='post_list'>
    @foreach($posts as $post)
      <li class='post_result'>
        <div class='user_post'>
          <img src="{{ asset('images/' . $users->icon_image) }}" alt="アイコン">

          <div class='user_data'>
            <p>{{ $post->user->username }}</p>
            <p>{!! nl2br(e($post->post)) !!}</p>

          </div>
        </div>
          <p class='update_at'>{{ $post->updated_at->format('Y-m-d H:i') }}</p>

      </li>
    @endforeach
  </ul>
</x-login-layout>
