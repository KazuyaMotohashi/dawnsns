@extends('layouts.login')

@section('content')

<div>
<form action="/profile/update" method ="POST" enctype="multipart/form-data">
    @csrf
    <label>UserName</label>
    <input type="text" name ="username" value ="{{ $users -> username }}"></input>
     <label>MailAddress</label>
    <input type="mail" name ="mail" value ="{{ $users-> mail }}"></input>
     <label>Password</label>
    <input type="password" name ="password" value ="PassWord" readonly></input>
     <label>new Password</label>
    <input type="password" name ="newPassword" value =""></input>
     <label>Bio</label>
    <input type="textarea" name ="bio" value ="{{ $users -> bio }}" cols ="150" ></input>
     <label>Icon image</label>
    <input type="file" name ="images" value ="{{ $users -> images }}"></input>
  </div>
  <button type="submit" class="btn btn-success pull-right">更新</button>
</form>
</div>

@endsection
