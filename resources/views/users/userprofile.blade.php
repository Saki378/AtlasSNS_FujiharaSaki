<x-login-layout>

<div class="flex userbox">
  @isset($follow_data)
    @if($follow_data->icon_image == 'icon1.png')
    <img class="icon" src="/images/icon1.png">
    @else
    <img class="icon" src="/storage/images/{{$follow_data->icon_image}}" alt="ユーザーアイコン">
    @endif
  <table class="follow_table">
    <tr>
      <th><p>ユーザー名</p></th>
      <td><span class="text_bold">{{ $follow_data->username }}</span></td>
    </tr>
    <tr>
      <th><p>自己紹介</p></th>
      <td><span class="text_bold">{{ $follow_data->bio}}</span></td>
    </tr>
  </table>

  <div class="user_follow">
    @if(Auth::user()->checkFollow($follow_data->id))
    <a class="btn btn-danger" href="/{{$follow_data->id}}/follow/destroy">フォロー解除</a>
    @else
    <a class="btn btn-primary" href="/{{$follow_data->id}}/follow">フォローする</a>
    @endif
  </div>
  @endisset
</div>

<hr>

<div class="wrapper">
  @foreach ($follow_post as $posts)
  <div class="flex">
      @if($posts->user->icon_image == 'icon1.png')
      <img class="post_icon" src="/images/icon1.png">
      @else
      <img class="post_icon" src="/storage/images/{{$posts->user->icon_image}}" alt="ユーザーアイコン">
      @endif
    <div class="post_text">
      <p><span class="text_bold">{{$posts->user->username}}</span></p>
      <p>{!! nl2br(htmlspecialchars($posts->post)) !!}</p>
    </div>
    <div class="post_time">
      <p>{{$posts->updated_at->format('Y-m-d H:i')}}</p>
    </div>
  </div>

    <hr>
    @endforeach
</div>

</x-login-layout>
