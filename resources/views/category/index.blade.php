@extends('layouts.app')


@section('content')
    <div class="container">
        @if(session()->has('error_message'))
        <div class="alert alert-danger">
        {{session()->get("error_message")}}
        </div>
        @endif

        @if(session()->has('sucess_message'))
        <div class="alert alert-success">
        {{session()->get("sucess_message")}}
        </div>
        @endif

        <div class="form-row">
            <div class="form-group">
            <a href="{{route('category.create')}}" class="btn btn-success">Add category and (or) post</a>
            </div>
        </div>


        <table class="table table-striped">

            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('title', 'Title')</th>
                <th>@sortablelink('excertpt', 'Excertpt')</th>
                <th>@sortablelink('email', 'Email')</th>
                <th>Post records</th>
                <th> Action </th>
                <th> Delete </th>
            </tr>

            @foreach ($categories as $category)
                <tr>
                <form method="post" action={{ route('category.destroy', [$category]) }}>
                {{-- <td><input type="checkbox" name="checked[]" class="checkboxes" value="{{ $category->id }}" /></td> --}}
                    <td>{{ $category->id }} </td>
                    <td>{{ $category->title }} </td>
                    <td>{{ $category->excertpt}} </td>
                    <td>{{ $category->email }} </td>
                    <td>{{$category->categoryPosts->count()}}</td>
                    <td>
                        <div class="btn-group-vertical">
                            <a href="{{ route('category.show', [$category]) }}" class="btn btn-secondary">Show </a>
                            <a href="{{ route('category.edit', [$category]) }}" class="btn btn-primary">Edit </a>
                        </div>
                        <td>

                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>


    </div>
@endsection
