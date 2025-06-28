        <div id="head">
            <h1><a href="top"><img src="/images/atlas.png"></a></h1>
            <div id="flex_nav">
                <div id="youname">
                    <p>{{ Auth::user()->username }}さん</p>
                </div>
                <nav>
                 <details class="details">
                 <summary><!-- ナビゲーション -->

                </summary>
                  <ul>
                    <li><a href="top">HOME</a></a></li>
                    <li><a href="profile">プロフィール編集</a></li>
                    <li><a href="logout">ログアウト</a></li>
                  </ul>
                 </details>
                </nav>

                <div class="icon" >
                  @if(Auth::user()->icon_image == 'icon1.png')
                  <img src="/images/icon1.png">
                  @else
                  <img src="/storage/images/{{Auth::user()->icon_image }}">
                  @endif
                </div>
            </div>
        </div>
