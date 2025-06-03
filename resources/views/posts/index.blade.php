<x-login-layout>


  <h2>機能を実装していきましょう。</h2>

  <div class="container">
    <img src=" images/{{Auth::user()->icon_image }}">
    {{ Form::open(['url' => '/post_create']) }}
    @csrf
    {{ Form::text('post',null,['required', 'class' => 'texts', 'placeholder' => '投稿内容を入力してください。']) }}

      <input type="image" name="submit" src="{{asset('images/post.png')}}" alt="送信" class="btn">
      {{ Form::close() }}

  </div>
  <div class="container">
    <!-- フォローしているメンバーの投稿を新しい順番で表示 -->



  </div>




</x-login-layout>
