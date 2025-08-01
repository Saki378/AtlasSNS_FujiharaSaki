<x-login-layout>


  <!-- <h2>機能を実装していきましょう。</h2> -->
<div class="post_box">
  <div class="icon post_img">
      @if(Auth::user()->icon_image == 'icon1.png')
      <img src="/images/icon1.png">
      @else
      <img  src="/storage/images/{{Auth::user()->icon_image }}">
      @endif
  </div>
    {{ Form::open(['url' => '/post_create']) }}
      @csrf
    {{Form::textarea('post',null,['required', 'class' => 'texts', 'placeholder' => '投稿内容を入力してください。']) }}
    <input type="image" name="submit" src="{{asset('images/post.png')}}" alt="送信" class="post_btn post">
    {{ Form::close() }}
</div>


<hr>


<div class="wrapper">
      @foreach( $posts_all as $post_show )
  <div class="flex">
    <div class="icon post_icon">
      @if($post_show->user->icon_image == 'icon1.png')
      <img src="/images/icon1.png">
      @else
      <img src="/storage/images/{{ $post_show->user->icon_image }}">
      @endif
    </div>

    <div class="post_text">
      <p><span class="text_bold">{{ $post_show->user->username }}</span></p>
      <!-- 改行文字も反映する -->
      <p>{!! nl2br(htmlspecialchars($post_show->post)) !!}</p>
    </div>

    <div class="post_time">
      <p>{{ $post_show->created_at->format('Y-m-d H:i') }}</p>
    </div>
  </div>

  @if(Auth::id() == $post_show->user_id)
  <div class="content btn_box">
      <!-- 投稿のモーダル編集ボタン -->
      <a class="js-modal-open " href="" post="{{ $post_show->post }}" post_id="{{ $post_show->id }}"><img class="post_btn update_btn" src="{{asset('images/edit.png')}}" onmouseover="this.src='{{asset('images/edit_h.png')}}'" onmouseout="this.src='{{asset('images/edit.png')}}'"  alt="編集" name="submit" ></a>
      <!-- 投稿削除ボタン -->
      <a class="post_delete " href="/{{$post_show->id}}/delete" onclick='return confirm("本当に削除しますか？")'><img class="post_btn delete_btn" src="{{asset('images/trash.png')}}" onmouseover="this.src='{{asset('images/trash-h.png')}}'" onmouseout="this.src='{{asset('images/trash.png')}}'" alt="編集" name="submit" ></a>
  </div>
  @endif

  <div class="modal js-modal">
    <div class="modal_bg js-modal-close">
    </div>
    <div class="modal_window">
      <!-- {{ Form::open(['url' => '/{id}/update']) }} -->
      <form action="/{id}/update" method="get">
        {{ Form::textarea('post',null,['required', 'class' => 'modal_post']) }}
        {{ Form::hidden('id','post_id',['required','class'=>'modal_id']) }}
        <!-- <input type="hidden" name="" class="modal_id" value="post_id"> -->
        <input type="image" name="submit" src="{{asset('images/edit.png')}}" alt="編集" class="post_btn">
        {{ csrf_field() }}
      </form>
    </div>
  </div>
    <hr>
      @endforeach
</div>


</x-login-layout>
