<x-login-layout>


  <div class="follow">
    <h2>フォローリスト</h2>
    <div class="follow_item">
      @foreach($follow_data as $icon)
      <a href="{{$icon->id}}profile"><img class="line_icon" src="/storage/images/{{ $icon->icon_image }}"></a>
      @endforeach
    </div>
  </div>

  <hr>

  <div class="wrapper">
      @foreach($follow_post as $follow)
      <div class="flex">
        <!-- PROFILEへリンク -->
        <a class="icon_box" href="{{$follow->user->id}}profile">
          <img class="post_icon line_icon" src="/storage/images/{{ $follow->user->icon_image }}">
        </a>

      <div class="post_text">
        <!-- フォローユーザー名 -->
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
