<x-login-layout>


  <div class="follow">
    <h2>フォロワーリスト</h2>
    <!-- アイコン２０個まで表示 -->
    <div class="follow_item">
      @foreach($follower_users as $data)
      <a href="{{$data->id}}profile">
        @if($data->icon_image == 'icon1.png')
        <img src="/images/icon1.png">
        @else
        <img src="/storage/images/{{ $data->icon_image }}">
        @endif
      </a>
      @endforeach
    </div>
  </div>

  <hr>

  <div class="wrapper">
    @foreach($followser_post as $follow)
    <div class="flex">
      <!-- PROFILEへリンク -->
      <a href="{{$follow->user->id}}profile">
        @if( $follow->user->icon_image == 'icon1.png')
        <img class="post_icon" src="/images/icon1.png">
        @else
        <img class="post_icon" src="/storage/images/{{ $follow->user->icon_image }}">
        @endif
      </a>

      <div class="post_text">
        <!-- フォロワーユーザー名 -->
        <p><span class="text_bold">
         {{ $follow->user->username }}
         </span></p>
        <!-- フォローしているユーザーの投稿表示改行も含む -->
        <p>{!! nl2br(htmlspecialchars($follow->post)) !!}</p>
      </div>

      <div class="post_time">
        <!-- フォローしているユーザーの投稿時間表示 -->
       <p>{{$follow->created_at->format('Y-m-d H:i')}}</p>
      </div>

    </div>
    <hr>

    @endforeach

  </div>

</x-login-layout>
