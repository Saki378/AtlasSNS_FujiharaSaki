<x-login-layout>





  <div class="follow">
    <h2>フォロワーリスト</h2>
    <!-- アイコン２０個まで表示 -->
    <div class="follow_item">
      @foreach($follower_users as $data)
     <a href="{{$data->id}}profile"><img class="line_icon" src="/storage/images/{{ $data->icon_image }}"></a>
      @endforeach
    </div>

  </div>


  <hr>

  <div class="wrapper">
  <!-- フォローしてくれているメンバーの投稿を新しい順番で表示 -->
  @foreach($followser_post as $follow)
      <div class="flex">
      <!-- PROFILEへリンク -->
      <a href="{{$follow->user->id}}profile"><img class="post_icon line_icon" src="/storage/images/{{ $follow->user->icon_image }}"></a>
      <!-- フォローユーザー名 -->
      {{ $follow->user->username }}
      <!-- フォローしているユーザーの投稿表示 -->
      {{$follow->post;}}
      <!-- フォローしているユーザーの投稿時間表示 -->
      {{$follow->created_at}}
      </div>
      <hr>
      @endforeach

</div>


</x-login-layout>
