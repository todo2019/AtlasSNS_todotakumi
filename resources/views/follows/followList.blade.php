<x-login-layout>

  <div class='followList'>
    <span class='follow_title'>フォローリスト</span>
    @foreach($follows as $follow)
      <a href="{{ route('user.profile.post', ['user' => $follow->id]) }}">
        <img class='follow_icon' src="{{ $follow->icon_image === 'icon1.png'? asset('images/' . $follow->icon_image): asset('storage/' . $follow->icon_image) }}" alt="ユーザーアイコン">
      </a>
    @endforeach
  </div>
  <ul >
    @foreach($posts as $post)
      <li class='post_result'>
        <div class='user_post'>
          <a href="{{ route('user.profile.post', ['user' => $post->user->id]) }}">
            <img class='icon_list' src="{{ $post->user->icon_image === 'icon1.png'? asset('images/' . $post->user->icon_image): asset('storage/' . $post->user->icon_image) }}" alt="ユーザーアイコン">
          </a>
          <div class='user_data'>
            <p>{{ $post->user->username }}</p>
            <p>{{ $post->post }}</p>
          </div>
        </div>
        <p class='update_at'>{{ $post->updated_at->format('Y-m-d H:i') }}</p>
    @endforeach
  </ul>

</x-login-layout>
