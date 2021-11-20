@extends('layouts.app')

@section('content')

<div class="container container-show">


    <div class="card">
        <div class="card-body">
            <h2 class="card-title">ID: {{$category->id}} Title: {{$category->title}}</h2>
            <p class="card-text">Category excertpt: {{$category->excertpt }} </p>
            <p class="card-text">Category email: {{$category->email }} </p>
        </div>
    </div>

            @if ($postsCount != 0)
            <div class="row posts">
                @foreach ($posts as $post)

                <div class="col-12 col-sm-8 col-md-6 col-lg-4 mt-4 post">
                    <div class="card">
                      <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/pasta.jpg" alt="Bologna">
                      <div class="card-body">
                        <h4 class="card-title">Post title: {{$post->title}}</h4>
                        <div>
                        <small class="text-muted cat">
                          <i class="far fa-clock text-info"></i>Category title: {{ $post->postCategory->title }}
                        </small>
                        </div>
                        <small class="text-muted cat">
                          <i class="fas fa-users text-info"></i>Category e-mail: {{$post->postCategory->email}}
                        </small>
                        <p class="card-text">Post excertpt: {{$post->excertpt}}</p>

                      </div>
                      <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                        <div class="delete">
                                <button type="submit" class="btn btn-danger postDelete" data-postid="{{$post->id}}">DELETE AJAX</button>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            <p>The category has no posts</p>
        </div>
    @endif

</div>
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $(".postDelete").click(function() {
            var postID = $(this).attr("data-postid");
            $(this).parents(".post").remove();
            //ajax
            //route(client.destroyAjax,[$client])
            $.ajax({
                type: 'POST',
                url: '/post/deleteAjax/' + postID ,// action
                success: function(data) {
                    alert(data.success);
                    if(data.postsCount == 0) {
                        $(".posts").remove();
                        $(".container-show").append("<div class='alert alert-danger'><p>The category has no posts</p></div> ")
                        //
                    }
                }
            });
        });
    });
</script>

@endsection
