@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>
<div>
  <p>username</p>
  {{ Form::label('ユーザー名') }}
  {{ Form::text('username',null,['class' => 'input']) }}
  {{$errors -> first('username')}}
</div>

<div>
  <p>MailAddress</p>
  {{ Form::label('メールアドレス') }}
  {{ Form::text('mail',null,['class' => 'input']) }}
  {{$errors -> first('mail')}}
</div>

<div>
  <p>password</p>
  {{ Form::label('パスワード') }}
  {{ Form::password('password',null,['class' => 'input']) }}
  {{$errors -> first('password')}}
</div>

<div>
  <p>password confirm</p>
  {{ Form::label('パスワード確認') }}
  {{ Form::password('password_confirmation',null,['class' => 'input']) }}
  {{$errors -> first('password_confirmation')}}
</div>

<div>
{{ Form::submit('登録') }}
</div>

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
