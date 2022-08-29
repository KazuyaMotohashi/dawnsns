@extends('layouts.logout')

@section('content')

<div id="clear">
@if(Session::has('username'))
<span>{{session('username')}}さん</span>
@endif

<p>ようこそ！DAWNSNSへ！</p>
<p>ユーザー登録が完了しました。</p>
<p>さっそく、ログインをしてみましょう。</p>

<p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
