@extends('layouts.login')

@section('content')
<div class="top-item">
@foreach($followers as $followers_posts)
  <a href ="profile/{{$followers_posts->id}}" ><img class="icon" src ="{{ asset('storage/images/'.$followers_posts->images)}}"></a>
  @endforeach
</div>

<div>
  <div>
    @foreach($followers as $followers_posts)
    <div>
      <td><a href ="profile/{{$followers_posts->id}}" ><img class="icon" src ="{{ asset('storage/images/'.$followers_posts->images)}}"></a></td>
      <td>{{ $followers_posts ->username }}</td>
      <td>{{ $followers_posts ->post }}</td>
      <td>{{ $followers_posts ->created_at}}</td>
    </div>
    @endforeach
  </div>
</div>
@endsection
