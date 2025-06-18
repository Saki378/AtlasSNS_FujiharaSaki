<x-login-layout>


  <div class="follow">
  <p>フォローリスト</p>

  <!-- 重複を不可 -->
  @foreach($follow_data->unique('user_id') as $icon)
  <img class="post_icon line_icon" src="/storage/images/{{ $icon->user->icon_image }}">
  @endforeach


  </div>


  <hr>
  <div class="list">
      フォローしているメンバーの投稿を新しい順番で表示
      @foreach($follow_data as $follow)
      <div>
      <!-- PROFILEへリンク -->
      <a href="#">
      <img class="post_icon line_icon" src="/storage/images/{{ $follow->user->icon_image }}">
      </a>
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
