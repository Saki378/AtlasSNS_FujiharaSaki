<x-login-layout>


  <div class="follow">
  <h2>フォローリスト</h2>

  <!-- 重複を不可 -->
  @foreach($follow_data as $icon)

   <img class="post_icon line_icon" src="/storage/images/{{ $icon->icon_image }}">

  @endforeach

  </div>


  <hr>

  <div class="wrapper">
      @foreach($follow_post as $follow)
      <div class="flex">
      <!-- PROFILEへリンク -->
      <a href="#">
      <img class="post_icon line_icon" src="/storage/images/{{ $follow->user->icon_image }}">
      </a>
      <!-- フォローユーザー名 -->
       <span class="text_bold">
       {{ $follow->user->username }}
       </span>
      <!-- フォローしているユーザーの投稿表示 -->
      {{$follow->post;}}
      <!-- フォローしているユーザーの投稿時間表示 -->
      {{$follow->created_at}}
      </div>
      <hr>

      @endforeach

  </div>

</x-login-layout>
