@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>
<div class="register-form">
  <div class="form">
  <p>username</p>
  {{ Form::label('ユーザー名') }}
  {{ Form::text('username',null,['class' => 'input']) }}
  {{$errors -> first('username')}}
</div>

<div class="form">
  <p>MailAddress</p>
  {{ Form::label('メールアドレス') }}
  {{ Form::text('mail',null,['class' => 'input']) }}
  {{$errors -> first('mail')}}
</div>

<div class="form">
  <p>password</p>
  {{ Form::label('パスワード') }}
  {{ Form::password('password',null,['class' => 'input']) }}
  {{$errors -> first('password')}}
</div>

<div class="form">
  <p>password confirm</p>
  {{ Form::label('パスワード確認') }}
  {{ Form::password('password_confirmation',null,['class' => 'input']) }}
  {{$errors -> first('password_confirmation')}}
</div>
</div>

<div>
{{ Form::submit('register',['class'=>'register-btn']) }}
</div>

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
