        <div id="head">
            <hi><a href="{{ route('top') }}"><img src="images/atlas.png"></a></hi>
            <div id="">
                <div id="">
                    <p>{{ Auth::user()->username }}さん</p>
                </div>
                <ul>
                    <li><a href="/index">ホーム</a></li>
                    <li><a href="/profile">プロフィール</a></li>
                    <li><a href="/login">ログアウト</a></li>
                </ul>
            </div>
        </div>
