@extends('layouts.login')

@section('content')

<div class="top-item">
  <img class="icon" src="{{ asset('storage/images/'.$users->images)}}">
  {!!Form::open(['url'=>'post/create'])!!}
  <div class ="post-form">
  {!!Form::input('text','newPost',null,['required','class'=>'form-control','placeholder'=>'何をつぶやこうか…?'])!!}
  </div>
  <button type="submit" class="btn btn-success pull-right"><img src="images/post.png" alt="投稿"></button>
  {!!Form::close()!!}
</div>

<div>
@foreach($posts as $post)
<table class="post-item">
<tr>
  <td><img class="icon" src ="{{ asset('storage/images/'.$post->images)}}"></td>
  <td class="username-data">{{ $post ->username }}</td>
  <td class="post-data">{{ $post ->post }}</td>
  <td class="create-data">{{ $post ->created_at}}</td>
  @if($post -> user_id == Auth::id())
  <td><a class="modalOpen" href="" data-target="{{$post->id}}"><img src="images/edit.png" alt="編集"></a>
        <div class ="edit-form js-modal" id="{{$post->id}}">
          <div class="edit-inner">
            <div class="edit-content">
              <form class="active-form" action="post/{{$post->id}}/update" name="upPost" method="post">
                @csrf
                <textarea name="upPost" id="editForm" cols="150" rows="10" width:60%>{{$post->post}}</textarea>
                <div class="edit-img">
                <input  type="image" src="images/edit.png" alt="編集する">
                </div>
              </form>
            </div>
          </div>
        </div>
  </td>
  <td><a class=" btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash.png"onmouseover="this.src='images/trash_h.png'" onmouseout="this.src='images/trash.png'" alt="削除"></a></td>
  @endif
  @endforeach
</tr>
</table>
</div>

@endsection
