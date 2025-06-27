<x-login-layout>


<div class="seach">
     {!! Form::open() !!}
     @csrf
     {{ Form::input('text','search_name',null,['placeholder'=>'ユーザー名','class'=>'search-control']) }}
     <input type="image" name="submit" src="{{asset('images/search.png')}}" alt="送信" class="seach_img">
     {{ Form::close() }}

   <div class="seach_word">
     @isset($search_name)
      <p>検索ワード：{{$search_name}}</p>
     @endisset
  </div>
</div>

<hr>

<div class="wrapper">

  @foreach ( $all_users as $data )
  <div class="flex seach_box">
    <a class="seach_icon" href="/followpfofile/{{$data->id}}" ><img  src="/storage/images/{{$data->icon_image}}" alt="アイコン"></a>
    <div class="seach_name">
      <p><span class="text_bold ">{{ $data->username}}</span></p>
    </div>



    <!-- フォローorノンフォロー -->
    <div class="seach_btn">

     @if(Auth::user()->checkFollow($data->id))
      <a class="btn btn-danger" href="/{{$data->id}}/follow/destroy">フォロー解除</a>
     @else
      <a class="btn btn-primary" href="/{{$data->id}}/follow">フォローする</a>
     @endif
    </div>

  </div>

  @endforeach

</div>


</x-login-layout>
