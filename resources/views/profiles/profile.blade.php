<x-login-layout>


<div class="flex form_box">

  <img class="icon" src="/storage/images/{{Auth::user()->icon_image }}">

  <table class="profilebox">
    {!! Form::open(['url' => 'update_form','enctype'=>'multipart/form-data']) !!}
    @csrf
    {{ Form::hidden('id', $request->id) }}
   <tr>
    <td>{{ Form::label('ユーザー名') }}</td>
    <td>{{ Form::input('text','username',$request->username,['required','class'=>'form-control']) }}</td>
   </tr>

  <tr>
    <td>{{ Form::label('メールアドレス') }}</td>
    <td>{{ Form::input('email','email',$request->email,['required','class'=>'form-control']) }}
   </tr>

  <tr>
    <td>{{ Form::label('パスワード') }}</td>
    <td>{{ Form::input('password','NewPassword',null,['required','class'=>'form-control']) }}</td>
  </tr>

  <tr>
    <td>{{ Form::label('パスワード確認') }}</td>
    <td>{{ Form::input('password','NewPassword_confirmation',null,['class'=>'form-control']) }}</td>
  </tr>

  <tr>
    <td>{{ Form::label('自己紹介') }}</td>
    <td>{{ Form::input('text','Bio',$request->bio,['class'=>'form-control']) }}</td>
  </tr>

  <tr>
    <td>{{ Form::label('アイコン画像') }}</td>
    <td>
      <div id="attachment">
        <label class="file_btn"><span class="filename">ファイルを選択</span>{{ Form::input('file','IconImage','ファイルを選択',['class' => 'btn btn-light fileinput']) }}</label>
      </div>
    </td>
   </tr>
  </table>
</div>


{{Form::submit('更新',['class'=>'btn btn-danger profile_update'])}}


{!! Form::close() !!}

</x-login-layout>
