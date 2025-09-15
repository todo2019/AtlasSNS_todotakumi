<x-login-layout>


   <div class='followerList'>
    <p class='follower-title'>フォロワーリスト</p>
    @foreach($posts as $post)
      <img src="{{ asset('images/' . $post->user->icon_image) }}" class='follower-icon' alt="アイコン">
    @endforeach
  </div>
   <ul >
    @foreach($posts as $post)
      <li class='post-result'>
        <div class='user-post'>
            <img src="{{ asset('images/' . $post->user->icon_image) }}" alt="アイコン">
          <div class='user-data'>
            <p>{{ $post->user->username }}</p>
            <p>{{ $post->post }}</p>
          </div>
        </div>
        <p class='update-at'>{{ $post->updated_at }}</p>

    @endforeach
  </ul>

</x-login-layout>
