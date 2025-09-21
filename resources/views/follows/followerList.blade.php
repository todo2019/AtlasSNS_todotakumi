<x-login-layout>


   <div class='followerList'>
    <p class='follower-title'>フォロワーリスト</p>
    @foreach($followers as $follower)
      <a href="{{ route('user.profile.post', ['user' => $follower->id]) }}">
        <img src="{{ asset('images/' . $follower->icon_image) }}" class='follower-icon' alt="アイコン">
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
