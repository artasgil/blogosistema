@extends('layouts.app')

@section('content')
<div class="container">
<form method="POST" action="{{ route('category.update', [$category]) }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="category_title">Category title</label>
          <input type="text" class="form-control" id="category_title" name="category_title" placeholder="Category title" value="{{$category->title}}">
        </div>
        <div class="form-group col-md-4">
          <label for="category_excertpt">Category excertpt</label>
          <input type="text" class="form-control" id="post_excertpt" name="category_excertpt" placeholder="Category excertpt" value="{{$category->excertpt}}">
        </div>
        <div class="form-group col-md-4">
           <label for="category_email">Category email</label>
           <input type="email" class="form-control" id="category_email" name="category_email" placeholder="Category email" value="{{$category->email}}">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

</div>
@endsection

