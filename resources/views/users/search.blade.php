@extends('layouts.login')

@section('content')

<div class="top-item">
  {!!Form::open(['url'=>'search'])!!}
  <div class ="form-group">
  {!!Form::input('text','search',null,['null','class'=>'form-control','placeholder'=>'ユーザー名'])!!}
  </div>
  <button type="submit" class="btn btn-success pull-right"><span class="material-symbols-outlined">search</span></button>
  {!!Form::close()!!}
  @if($searchWord != null)
  <p>検索ワード：{{$searchWord}}</p>
  @endif
</div>

<div>
  @foreach($results as $result)
  <div>
    <td><img class="icon" src ="{{ asset('storage/images/'.$result->images)}}"></td>
    <td>{{$result -> username}}</td>
    @if(isset($result -> follower) == Auth::id())
    <a type="searchDeleteFollow" class="btn btn-delete" href ="/search/{{$result->id}}/delete">フォローをはずす</a>
    @else
    <a type="addFollow" class="btn btn-add" href ="/search/{{$result->id}}/add">フォローする</a>
    @endif
  </div>
  @endforeach
</div>

@endsection
