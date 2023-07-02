@extends('layouts.login')

@section('content')

<p class="title">Follow list</p>

<div class="top-item">
  @foreach($icons as $icon)
  <a href ="profile/{{$icon->id}}" ><img class="icon" src ="{{ asset('storage/images/'.$icon->images)}}"></a>
  @endforeach
</div>

<div>
  <div>
    @foreach($follows as $follows_posts)
    <div class="post-item">
      <td><a href ="profile/{{$follows_posts->user_id}}" ><img class="icon" src ="{{ asset('storage/images/'.$follows_posts->images)}}"></a></td>
      @if($follows_posts->post != null)
      <td>{{ $follows_posts ->username }}</td>
      <td>{{ $follows_posts ->post }}</td>
      <td>{{ $follows_posts ->created_at}}</td>
      @endif
    </div>
    @endforeach
  </div>
</div>
@endsection
