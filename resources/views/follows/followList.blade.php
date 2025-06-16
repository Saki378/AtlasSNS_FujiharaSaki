<x-login-layout>


  <div class="box">
  <p>フォローリスト</p>
  @foreach($follow_data as $follow)
  <img class="post_icon line_icon" src="/storage/images/{{ $follow->icon_image }}">
  @endforeach
  </div>


  <hr>
  <div>
      フォローしているメンバーの投稿を新しい順番で表示

      @foreach($follow_data as $follow)
      <div>
      <a href="#">
      <img class="post_icon line_icon" src="/storage/images/{{ $follow->icon_image }}">
      </a>
      {{ $follow->username }}

      {{ $follow->post}}

      </div>
      @endforeach






  </div>

</x-login-layout>
