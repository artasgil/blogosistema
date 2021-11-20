@extends('layouts.app')

@section('content')
<div class="container">
<form method="POST" action="{{ route('post.store') }}">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="post_title">Post title</label>
        <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Post title">
      </div>
      <div class="form-group col-md-6">
        <label for="post_excertpt">Post excertpt</label>
        <input type="text" class="form-control" id="post_excertpt" name="post_excertpt" placeholder="Post excertpt">
      </div>
    </div>
    <div class="form-group">
      <label for="post_description">Post description</label>
      <textarea class="form-control" id="post_description" name="post_description" placeholder="Post description"></textarea>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4 categoryNew">
        <label for="inputState">Choose category</label>
        <select id="postCategory" name="postCategory" class="form-control">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="categoryNew" name="categoryNew" value="1">
        <label class="form-check-label" for="gridCheck">
          Add new category?
        </label>
      </div>
    </div>


<div class="category-info d-none">
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="category_title">Category title</label>
          <input type="text" class="form-control" id="category_title" name="category_title" placeholder="Category title">
        </div>
        <div class="form-group col-md-4">
          <label for="category_excertpt">Category excertpt</label>
          <input type="text" class="form-control" id="post_excertpt" name="category_excertpt" placeholder="Category excertpt">
        </div>
        <div class="form-group col-md-4">
           <label for="category_email">Category email</label>
           <input type="email" class="form-control" id="category_email" name="category_email" placeholder="Category email">
      </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Create</button>

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
