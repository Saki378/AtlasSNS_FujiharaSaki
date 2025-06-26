<x-login-layout>


<div class="search">


{!! Form::open() !!}
@csrf
{{ Form::input('text','search_name',null,['placeholder'=>'ユーザー名','class'=>'search-control']) }}
<input type="image" name="submit" src="{{asset('images/search.png')}}" alt="送信" class="post_btn">

  {{ Form::close() }}

@isset($search_name)
  <p>検索ワード：{{$search_name}}</p>
@endisset



</div>
<hr>
<div class="wrapper">

 自分以外のユーザー一覧を表示
    フォローボタン・フォロー解除ボタン
    ボタンを押したら検索ページをリロード

  @foreach ( $all_users as $data )
  <div class="flex">
    <a href="/followpfofile/{{$data->id}}" >
    <img class="post_icon" src="/storage/images/{{$data->icon_image}}" alt="アイコン">
    </a>
    <span class="text_bold">{{ $data->username}}</span>

    <!-- フォローorノンフォロー -->



     <a href="/{{$data->id}}/follow">
      <button type="submit" class="btn btn-primary" >フォローする</button></a>

     <a href="/{{$data->id}}/follow/destroy"><button type="submit" class="btn btn-danger">フォロー解除
      </button></a>




  </div>

  @endforeach

</div>


</x-login-layout>
