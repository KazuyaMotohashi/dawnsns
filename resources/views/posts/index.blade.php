@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<th></th>
<th>ID</th>
<th>投稿内容</th>
<th>投稿日時</th>
<th></th>
<th></th>

@foreach($posts as $post)
<tr>
  <td ><img src ="{{ asset('/public/images'.$post->images)}}" href =""></td>
  <td>{{ $post ->username }}</td>
  <td>{{ $post ->post }}</td>
  <td>{{ $post ->created_at}}</td>
  <td><a class="btn btn-primary" href="/post/{{ $post->id }}/update-form">更新</a></td>
  <td><a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
</tr>
@endforeach

@endsection
