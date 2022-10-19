@extends('layouts.login')

@section('content')
@foreach($follows as $follows_posts)

  <td><a href ="profile/{{$follows_posts->user_id}}" ><img src ="{{ asset('storage/images/'.$follows_posts->images)}}"></a></td>
  <td>{{ $follows_posts ->username }}</td>
  <td>{{ $follows_posts ->post }}</td>
  <td>{{ $follows_posts ->created_at}}</td>
  @endforeach
@endsection
