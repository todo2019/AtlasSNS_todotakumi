<x-login-layout>


  <div class="post-container">
    <img class='user-icon' src="{{ asset('images/' .  Auth::user()->icon_image) }}" alt="アイコン" >
    <form action="{{ route('post') }}" method="post">
      @csrf
      <input type="text" name="post" class="post" placeholder="投稿内容を入力してください。">
      <button type="submit" class="post-icon" >
        <img src="/images/post.png">
      </button>
    </form>
  </div>

  <ul class='post-list'>
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
      @if($post->user_id == Auth::id())
      <div class='icon-set'>
        <button type="button" class="edit-button">
         <img class="edit-icon" src="/images/edit.png">
        </button>
          <a href="{{ route('post.delete',  ['id' => $post->id]) }}"onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
            <img class="delete-icon" src="/images/trash.png">
          </a>
      </div>


        <div class="edit-item">
          <form action="{{ route('post.update',  ['id' => $post->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="post" class="post-edit" value="{{ $post->post }}">
            <button type="submit">
              <img class="edit-icon2" src="/images/edit.png">
            </button>
          </form>
        </div>
      </li>
      @endif
    @endforeach
  </ul>


</x-login-layout>
