<x-login-layout>


  <!-- <h2>機能を実装していきましょう。</h2> -->
<div class="flex post_box">
    <img class="post_icon" src="/storage/images/{{Auth::user()->icon_image }}">
    {{ Form::open(['url' => '/post_create']) }}
    @csrf
    {{ Form::textarea('post',null,['required', 'class' => 'texts', 'placeholder' => '投稿内容を入力してください。']) }}

      <input type="image" name="submit" src="{{asset('images/post.png')}}" alt="送信" class="post_btn">
      {{ Form::close() }}

</div>
<hr>
<div class="post_item">
      @foreach( $posts_all as $post_show )
  <div class="flex line_box">
        <img class="post_icon line_icon" src="/storage/images/{{ $post_show->user->icon_image }}">
      <div class="post_text">
        <p><span class="text_bold">{{ $post_show->user->username }}</span></p>
        <p>{{ $post_show->post }}</p>
      </div>

      <div class="post_time">
        <p>{{ $post_show->created_at }}</p>
      </div>
  </div>

    <div class="btn_box">

        <a class="post_update" href="/post/{{$post_show->id}}/update-form">
        <input type="image" name="submit" src="{{asset('images/edit.png')}}" alt="編集" class="post_btn">
        </a>



        <a class="post_delete" href="#">
        <input type="image" name="submit" src="{{asset('images/trash.png')}}" alt="削除" class="post_btn">
        </a>
    </div>

      <hr>

      @endforeach




</div>


</x-login-layout>
