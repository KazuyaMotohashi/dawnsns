@extends('layouts.login')

@section('content')

<div class="user-profile">
  <div>
    <img class="icon" src="{{ asset('storage/images/'.$users->images)}}">
  </div>
<form action="/profile/update" method ="POST" enctype="multipart/form-data" class="profile-form">
    @csrf
      <div>
        <label>UserName</label>
        <input type="text" name ="username" value ="{{ $users -> username }}"></input>
      </div>
      <div>
        <label>MailAddress</label>
        <input type="mail" name ="mail" value ="{{ $users-> mail }}"></input>
      </div>
      <div>
        <label>Password</label>
        <input type="password" name ="password" value ="PassWord" readonly></input>
      </div>
      <div>
        <label>new Password</label>
        <input type="password" name ="newPassword" value =""></input>
      </div>
      <div>
        <label>Bio</label>
        <input type="textarea" name ="bio" value ="{{ $users -> bio }}" cols ="150" ></input>
      </div>
      <div>
        <label>Icon image</label>
        <input type="file" name ="images" value ="{{ $users -> images }}"></input>
      </div>
  <button type="submit" class="btn btn-success pull-right">更新</button>
</form>
</div>

@endsection
