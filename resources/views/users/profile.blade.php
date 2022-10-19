@extends('layouts.login')

@section('content')

<div>
  <h2><img src="{{asset('storage/images/'.$userInformation->images)}}" alt="Icon"></h2>
  <p>Name {{$userInformation-> username }}</p>
  <p>Bio {{$userInformation -> bio }}</p>
@if($status -> follower = Auth::id()){
<a type="addFollow" class="btn btn-add" href ="/profile/{{$userInformation->id}}/add">フォローする</a>
}else{}
<a type="deleteFollow" class="btn btn-delete" href ="/profile/{{$userInformation->id}}/delete">フォローをはずす</a>
}
@endif
</div>

@foreach($posts as $post)
  <td><img src ="{{asset('storage/images/'.$post->images)}}"></td>
  <td>{{ $post -> username }}</td>
  <td>{{ $post ->post }}</td>
  <td>{{ $post ->created_at}}</td>

  @endforeach

@endsection
