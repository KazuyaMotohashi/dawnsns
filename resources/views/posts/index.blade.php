@extends('layouts.login')



@section('content')
<h2>機能を実装していきましょう。</h2>
<div>
  {!!Form::open(['url'=>'post/create'])!!}
  <div class ="form-group">
  {!!Form::input('text','newPost',null,['required','class'=>'form-control','placeholder'=>'何をつぶやこうか…?'])!!}
  </div>
  <button type="submit" class="btn btn-success pull-right"><img src="images/post.png" alt="投稿"></button>
  {!!Form::close()!!}
</div>

<th></th>
<th>ID</th>
<th>投稿内容</th>
<th>投稿日時</th>
<th></th>
<th></th>

@foreach($posts as $post)
<tr>
  <td><img src ="{{ asset('storage/images/'.$post->images)}}"></td>
  <td>{{ $post ->username }}</td>
  <td>{{ $post ->post }}</td>
  <td>{{ $post ->created_at}}</td>
  @if($post ->user_id == Auth::id())
  <td><a class="btn btn-primary" href="/post/{{ $post->id }}/update-form"><img src="images/edit.png" alt="編集"></a></td>
  <td><a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash.png" alt="削除"></a></td>
  @endif
  @endforeach

@endsection
