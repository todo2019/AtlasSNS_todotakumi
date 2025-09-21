<x-login-layout>

  <div class='followList'>
    <p class='follow-title'>フォローリスト</p>
    @foreach($follows as $follow)
      <a href="{{ route('user.profile.post', ['user' => $follow->id]) }}">
        <img src="{{ asset('images/' . $follow->icon_image) }}" class='follow-icon' alt="アイコン">
      </a>
    @endforeach
  </div>
  <ul >
    @foreach($posts as $post)
      <li class='post-result'>
        <div class='user-post'>
          <a href="{{ route('user.profile.post', ['user' => $post->user->id]) }}">
            <img src="{{ asset('images/' . $post->user->icon_image) }}" alt="アイコン">
          </a>
          <div class='user-data'>
            <p>{{ $post->user->username }}</p>
            <p>{{ $post->post }}</p>
          </div>
        </div>
        <p class='update-at'>{{ $post->updated_at }}</p>
    @endforeach
  </ul>

</x-login-layout>
