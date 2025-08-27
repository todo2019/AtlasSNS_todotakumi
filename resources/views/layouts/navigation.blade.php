      <div id="head">
          <h1><a href="{{ route('top') }}" ><img src="images/atlas.png" class="logo"></a></h1>
          <div class="header" id="header">
              <div id="username">
                  <p>{{ Auth::user()->username }}　さん</p>
              </div>

              <div class="accordion-menu">
                <div class="toggle-button"  id="menu-toggle"></div>

                <div id="icon">
                  <img src="{{ asset('storage/' . Auth::user()->icon_image) }}" alt="ユーザーアイコン" >
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                </form>
                <ul class="navi-menu">
                  <li><a href="/top">ホーム</a></li>
                  <li><a href="/profile">プロフィール</a></li>
                  <li><a href="/login" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></li>

                </ul>
              </div>
          </div>
      </div>
