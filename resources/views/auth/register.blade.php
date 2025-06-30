<x-logout-layout>
    <!-- 適切なURLを入力してください -->
{!! Form::open(['url' => 'register']) !!}

<div class="register">
    <h2>新規ユーザー登録</h2>

    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',null,['class' => 'input']) }}

    {{ Form::label('メールアドレス') }}
    {{ Form::email('email',null,['class' => 'input']) }}

    {{ Form::label('パスワード') }}
    {{ Form::password('password',null,['class' => 'input']) }}

    {{ Form::label('パスワード確認') }}
    {{ Form::password('password_confirmation',null,['class' => 'input']) }}

    <!-- エラーメッセージ -->
    @error('username')
    <p>{{ $message}}</p>
    @enderror

    @error('email')
    <p>{{ $message}}</p>
    @enderror

    @error('password')
    <p>{{ $message}}</p>
    @enderror

    {{ Form::submit('新規登録') }}

    <p><a href="login">ログイン画面へ戻る</a></p>
</div>
{!! Form::close() !!}


</x-logout-layout>
