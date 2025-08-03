      <div id="head">
          <hi><a href="{{ route('top') }}"><img src="images/atlas.png"></a></hi>
          <div id="header">
              <div id="username">
                  <p>{{ Auth::user()->username }}さん</p>
              </div>

              <div class="accordion-menu">
                <div class="toggle-button"  id="menu-toggle">
                    &lt;
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
