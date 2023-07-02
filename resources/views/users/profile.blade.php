@extends('layouts.login')

@section('content')

<div class="top-item">
  <img class="icon" src="{{asset('storage/images/'.$userInformation->images)}}" alt="Icon">
  <p>Name {{$userInformation-> username }}</p>
  <p>Bio {{$userInformation -> bio }}</p>
@if(isset($status -> follower) == Auth::id())
<a type="deleteFollow" class="btn btn-delete" href ="/profile/{{$userInformation->id}}/delete">フォローをはずす</a>
@else
<a type="addFollow" class="btn btn-add" href ="/profile/{{$userInformation->id}}/add">フォローする</a>
@endif
</div>

<div>
  @foreach($posts as $post)
  <td><img class="icon" src ="{{asset('storage/images/'.$post->images)}}"></td>
  <td>{{ $post -> username }}</td>
  <td>{{ $post ->post }}</td>
  <td>{{ $post ->created_at}}</td>
</div>
  @endforeach

@endsection
