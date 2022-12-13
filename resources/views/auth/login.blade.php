@extends('layouts.logout')


@section('content')
@csrf
{!! Form::open() !!}


<p>DAWNSNSへようこそ</p>
<div>
  {{ Form::label('MailAddress') }}
  {{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div>
  {{ Form::label('password') }}
  {{ Form::password('password',['class' => 'input']) }}
</div>
<div>
  {{ Form::submit('ログイン') }}
</div>

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
