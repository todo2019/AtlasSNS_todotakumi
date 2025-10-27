<x-login-layout>


   <div class='followerList'>
    <span class='follower_title'>フォロワーリスト</span>
        @foreach($followers as $follower)
      <a href="{{ route('user.profile.post', ['user' => $follower->id]) }}">
        <img class='follow_icon' src="{{ $follower->icon_image === 'icon1.png'? asset('images/' . $follower->icon_image): asset('storage/' . $follower->icon_image) }}" alt="ユーザーアイコン">
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
