@extends('layouts.login')

@section('content')




<th></th>
<th>ID</th>
<th>投稿内容</th>
<th>投稿日時</th>

@foreach($posts as $post)
  <td><img src ="{{ asset('storage/images/'.$post->images)}}"></td>
  <td>{{ $post ->username }}</td>
  <td>{{ $post ->post }}</td>
  <td>{{ $post ->created_at}}</td>

  @endforeach

@endsection
