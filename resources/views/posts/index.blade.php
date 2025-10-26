<x-login-layout>

  <ul>
    <li class="post_container">
       <img class ='user_icon' src="{{ asset('storage/' . Auth::user()->icon_image) }}" alt="アイコン">
      <form action="{{ route('post') }}" method="post" class='post_form'>
        <div>
          @csrf
          <textarea name="post" class="post" placeholder="投稿内容を入力してください。"></textarea>
          @error('post')
            <div class="error">{{ $message }}</div>
          @enderror
          @error('post.update')
            <div class="error">{{ $message }}</div>
          @enderror
        </div>
        @if (session('success'))
          <div class="alert-success">
            {{ session('success') }}
          </div>
        @endif
        <button type="submit" class="post_icon" >
          <img src="/images/post.png">
        </button>
      </form>
    </li>
  </ul>

  <ul class='post_list'>
    @foreach($posts as $post)
      <li class='post_result'>
        <div class='user_post'>
          <a href="{{ route('user.profile.post', ['user' => $post->user->id]) }}">
            <img class='icon_list' src="{{ asset('storage/' . $post->user->icon_image) }}" alt="アイコン">
          </a>
          <div class='user_data'>
            <p class='post_username'>{{ $post->user->username }}</p>
            <p class='post_post'>{!! nl2br(e($post->post)) !!}</p>
          </div>
        </div>
        <p class='update_at'>{{ $post->updated_at->format('Y-m-d H:i') }}</p>
      @if($post->user_id == Auth::id())
      <div class='icon_set'>
        <button type="button" class="edit_button">
          <img class="edit_icon" src="/images/edit.png"
          onmouseover="this.src='/images/edit_h.png'"
          onmouseout="this.src='/images/edit.png'">
        </button>
          <a href="{{ route('post.delete',  ['id' => $post->id]) }}"onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
            <img class="delete_icon" src="/images/trash.png"
            onmouseover="this.src='/images/trash-h.png'"
            onmouseout="this.src='/images/trash.png'">
          </a>
      </div>


        <div class="modal_overlay"></div>

        <div class="modal">
          <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="modal_area">
            <textarea name="post" class="post_edit">{{ $post->post }}</textarea>
            <button type="submit" class='edit_button'>
              <img class="modal_edit" src="/images/edit.png"
              onmouseover="this.src='/images/edit_h.png'"
              onmouseout="this.src='/images/edit.png'">
            </button>
          </div>
          </form>
        </div>
      </li>
      @endif
    @endforeach
  </ul>


</x-login-layout>
