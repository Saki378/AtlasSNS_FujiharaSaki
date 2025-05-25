        <div id="head">
            <h1><a href="top"><img src="images/atlas.png"></a></h1>
            <div id="flex_nav">
                <div id="">
                    <p>{{ Auth::user()->username }}さん</p>
                </div>
                <nav>
                 <details>
                 <summary>〇
                    <!-- 開くときは△閉じると▽ -->
                </summary>
                  <ul>
                    <li><a href="top">ホーム</a></li>
                    <li><a href="profile">プロフィール</a></li>
                    <li><a href="logout">ログアウト</a></li>
                  </ul>
                 </details>
                </nav>

                <div>
                <img src="images/{{ Auth::user()->icon_image }}">
                </div>
            </div>
        </div>
