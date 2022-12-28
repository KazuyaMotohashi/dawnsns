@extends('layouts.logout')


@section('content')
@csrf
{!! Form::open() !!}


<p class="welcome">DAWNSNSへようこそ</p>
<div class="login-form">
<div class="form">
  {{ Form::label('MailAddress') }}
  {{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class="form">
  {{ Form::label('password') }}
  {{ Form::password('password',['class' => 'input']) }}
</div>
</div>
<div class="btn">
  {{ Form::submit('ログイン',['class'=>'login-btn']) }}
</div>

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
