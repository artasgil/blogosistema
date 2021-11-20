@extends('layouts.app')

@section('content')
<div class="container">
<form method="POST" action="{{ route('post.update', [$post]) }}">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="post_title">Post title</label>
        <input type="text" class="form-control" id="post_title" name="post_title" value="{{$post->title}}">
      </div>
      <div class="form-group col-md-6">
        <label for="post_excertpt">Post excertpt</label>
        <input type="text" class="form-control" id="post_excertpt" name="post_excertpt" placeholder="Post excertpt" value="{{$post->excertpt}}">
      </div>
    </div>
    <div class="form-group">
      <label for="post_description">Post description</label>
      <textarea class="form-control" id="post_description" name="post_description" placeholder="Post description">{{$post->description}}</textarea>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4 categoryNew">
        <label for="inputState">Choose category</label>
        <select id="postCategory" name="category_id" class="form-control">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if($post->category_id == $category->id) selected @endif>{{ $category->title }}</option>
            @endforeach
        </select>
      </div>
    </div>

<button type="submit" class="btn btn-primary">Edit</button>

</form>
</div>




<script>
    $.ajaxSetup({
headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
}
});

$(document).ready(function()  {

    $("#categoryNew").click(function() {
    $(".category-info").toggleClass("d-none");
    $(".categoryNew").toggleClass("d-none");


    });
});


</script>
@endsection
