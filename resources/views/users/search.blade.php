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
<div class="search_follow">

自分以外のユーザー一覧を表示
    フォローボタン・フォロー解除ボタン
    ボタンを押したら検索ページをリロード

  @foreach ( $all_users as $data )
  <div>
    <img src="/storage/images/{{$data->icon_image}}" alt="アイコン">
    {{ $data->username}}

    <!-- フォローorノンフォロー -->
    <form method="POST" action="">
                    @csrf
                    <input name="follow_id" type="hidden" value="{{ $data->id }}" />
                    @if($data->username)
                        <button type="submit" class="btn btn-primary">
                            フォロー解除
                        </button>
                    @else
                        <button type="submit" class="btn btn-primary" >
                            フォローする
                        </button>
                    @endif
                </form>

  </div>
  @endforeach

</div>


</x-login-layout>
