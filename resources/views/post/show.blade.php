@extends('layouts.app')


@section('content')


<div class="container">

<div class="card">
    <div class="card-header">
      {{$post->title}}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$post->excertpt}}</h5>
      <p class="card-text">{{$post->description}}</p>
      <a href="{{route('post.index')}}" class="btn btn-primary">Go back</a>
    </div>
  </div>





</div>
@endsection
