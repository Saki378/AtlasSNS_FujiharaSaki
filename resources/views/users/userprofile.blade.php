<x-login-layout>

<div class="flex post_box">
@isset($follow_data)
<img class="icon" src="/storage/images/{{$follow_data->icon_image}}" alt="ユーザーアイコン">


  <table>
    <tr>
      <th>ユーザー名</th>
      <td>{{ $follow_data->username }}</td>
    </tr>
    <tr>
      <th>自己紹介</th>
      <td>{{ $follow_data->bio}}</td>
    </tr>
  </table>
  @endisset

  <div>
    <button class='btn'>フォローボタン</button>
  </div>

</div>

<hr>

<div class="wrapper">
@foreach ($follow_post as $posts)
<img class="post_icon" src="/storage/images/{{$posts->user->icon_image}}" alt="ユーザーアイコン">
  <div class=>
    <span class="text_bold">{{$posts->user->username}}
    </span>
    {{$posts->post}}
    {{$posts->updated_at}}
  </div>
<hr>
@endforeach
</div>

</x-login-layout>
