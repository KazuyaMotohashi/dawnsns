@extends('layouts.login')

@section('content')


@foreach($followers as $followers_posts)

  <td><a href ="profile/{{$followers_posts->user_id}}" ><img src ="{{ asset('storage/images/'.$followers_posts->images)}}"></a></td>
  <td>{{ $followers_posts ->username }}</td>
  <td>{{ $followers_posts ->post }}</td>
  <td>{{ $followers_posts ->created_at}}</td>
  @endforeach

@endsection
