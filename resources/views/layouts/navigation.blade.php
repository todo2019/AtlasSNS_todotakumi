      <div id="head">
          <h1><a href="{{ route('top') }}" ><img src="{{ asset('images/atlas.png') }}" class="logo"></a></h1>
          <div class="header" id="header">
              <div id="username">
                  <p>{{ Auth::user()->username }}　さん</p>
              </div>

              <div class="accordion_menu">
                <div class="toggle_button" id= 'menu_toggle'></div>

                <div class="icon">
                  <img src="{{ asset('images/' . Auth::user()->icon_image) }}" alt="ユーザーアイコン" >
                </div>

                <form action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                </form>
                <ul class="navi_menu">
                  <li ><a href="/top">HOME</a></li>
                  <li ><a href="/profile">プロフィール編集</a></li>
                  <li> <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></li>
                </ul>
              </div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
          </div>
      </div>
