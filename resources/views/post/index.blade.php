@extends('layouts.app')


@section('content')


    <div class="container">

        <div class="form-row">
            <div class="form-group">
            <a href="{{route('post.create')}}" class="btn btn-success">Add post</a>
            </div>
        </div>
        <p class="text-left">Sort by:
         @sortablelink('id', 'ID')
         @sortablelink('title', 'Title')
         @sortablelink('excertpt', 'Excertpt')
         @sortablelink('description', 'Description')
        </p>

        <form action="{{ route('post.index') }}" method="GET">
            @csrf
            <div class="form-row">
                <label for="post_category" class="col-form-label text-md-right">{{ __('Filter by category title: ') }}</label>
                <div class="form-group col-md-3">
                    <select class="form-control" name="category_id">
                        <option value="all" @if ($category_id == 'all') selected @endif > Visi </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category_id == $category->id) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                <button type="submit" class="btn btn-info">Filter</button>
                </div>
            </div>
        </form>

        <div class="row">
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
                    <a href="{{ route('post.show', [$post]) }}" class="btn btn-info">Show</a>

                  </div>
                  <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                    <div class="edit">
                        <a href="{{ route('post.edit', [$post]) }}" class="btn btn-light btn-sm">Edit</a>
                    </div>
                    <div class="delete">
                            <button type="submit" class="btn btn-danger postDelete" data-postid="{{$post->id}}">DELETE</button>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>

        <div class="row pagination-row col-12 mt-4">
                {!! $posts->appends(Request::except('page'))->render() !!}
        </div>
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
                    url: '/post/delete/' + postID ,// action
                    success: function(data) {
                        alert(data.success);
                    }
                });
            });
        });
    </script>


@endsection
