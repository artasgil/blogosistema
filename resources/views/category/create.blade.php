@extends('layouts.app')

@section('content')
<div class="container">
<form method="POST" action="{{ route('category.store') }}">
    @csrf
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
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="postNew" name="postNew" value="1">
        <label class="form-check-label" for="gridCheck">
          Add new post/posts?
        </label>
      </div>
    </div>


<div class="post-info d-none">
    <div class="form-row">
        <div class="form-group col-md-12">
        <button type="button" class="btn btn-success" id="add-more-posts">Add more posts</button>
        </div>
        <div class="form-group col-md-6">
          <label for="post_title">Post title</label>
          <input type="text" class="form-control" id="post_title" name="post_title[]" placeholder="Post title">
        </div>
        <div class="form-group col-md-6">
          <label for="post_excertpt">Post excertpt</label>
          <input type="text" class="form-control" id="post_excertpt" name="post_excertpt[]" placeholder="Post excertpt">
        </div>
      </div>
      <div class="form-group">
        <label for="post_description">Post description</label>
        <textarea class="form-control" id="post_description" name="post_description[]" placeholder="Post description"></textarea>
      </div>
</div>
<button type="submit" class="btn btn-primary">Create</button>
</form>


<div class="post-template d-none">
    <div class="post">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="post_title">Post title</label>
            <input type="text" class="form-control" id="post_title" name="post_title[]" placeholder="Post title">
            </div>
            <div class="form-group col-md-6">
            <label for="post_excertpt">Post excertpt</label>
            <input type="text" class="form-control" id="post_excertpt" name="post_excertpt[]" placeholder="Post excertpt">
            </div>
        </div>

        <div class="form-group">
            <label for="post_description">Post description</label>
            <textarea class="form-control" id="post_description" name="post_description[]" placeholder="Post description"></textarea>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-danger removePost">Remove Field</button>
        </div>
    </div>
</div>




<script>
    $.ajaxSetup({
headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
}
});

$(document).ready(function()  {

    $("#postNew").click(function() {
    $(".post-info").toggleClass("d-none");
    });

    $("#add-more-posts").click(function() {
        $(".post-info").append($(".post-template").html());
    });

    $(document).on("click", ".removePost", function() {
        $(this).parents('.post').remove();
    });
});


</script>
@endsection
