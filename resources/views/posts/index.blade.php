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
    @foreach($post as $posts)
     <li>
      <img src="{{ $posts->icon_image ?? '/default_icon.png' }}" >
      {{ $posts->username }}:
      {{ $posts->post }}
      <form action="{{ route('edit') }}" method="post" >
        @csrf
        <button type="submit" class="edit-icon" >
          <img src="/images/edit.png" >
        </button>
      </form>
    </li>
    @endforeach
  </ul>

</x-login-layout>
