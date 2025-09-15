<x-login-layout>


  <h2>機能を実装していきましょう。</h2>


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
