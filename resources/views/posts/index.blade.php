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


    <div class="content btn_box">
        <!-- 投稿の編集ボタン -->
        <a class="js-modal-open post_btn" href="" post="{{ $post_show->post }}" post_id="{{ $post_show->id }}"><input type="image" name="submit" src="{{asset('images/edit.png')}}" alt="編集" class="post_btn"></a>

        <a class="post_delete" href="#">
        <input type="image" name="submit" src="{{asset('images/trash.png')}}" alt="削除" class="post_btn">
        </a>
    </div>

     <div class="modal js-modal">
       <div class="modal_bg js-modal-close">
       </div>
       <div class="modal_window">
           <form action="" method="">
             <textarea name="" class="modal_post"></textarea>
             <input type="hidden" name="" class="modal_id" value="">
             <a class="post_update" href="/post/{{$post_show->id}}/update-form">
               <input type="image" name="submit" src="{{asset('images/edit.png')}}" alt="編集" class="post_btn">
             </a>
                {{ csrf_field() }}
            </form>

         </div>
      </div>

      <hr>

      @endforeach




</div>


</x-login-layout>
