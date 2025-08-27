<x-login-layout>


  <div class="container">

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
    <li>
      <img src="" >
      <p>{{ $post->user->username }}</p>
      <p>{{ $post->id }}: {{ $post->post }}</p>
      @if($post->user_id == Auth::id())
      <img class="edit-icon" src="/images/edit.png">
      <a href="{{ route('post.delete',  ['id' => $post->id]) }}"onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
        <img class="delete-icon" src="/images/trash.png">
      </a>


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
      @endif
    </li>
    @endforeach
  </ul>


</x-login-layout>
