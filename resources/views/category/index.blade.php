@extends('layouts.app')


@section('content')
    <div class="container">

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
                <th> Action </th>
                <th> Delete </th>
            </tr>

            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }} </td>
                    <td>{{ $category->title }} </td>
                    <td>{{ $category->excertpt}} </td>
                    <td>{{ $category->email }} </td>
                    <td>
                        <div class="btn-group-vertical">
                            <a href="{{ route('category.show', [$category]) }}" class="btn btn-secondary">Show </a>
                            <a href="{{ route('category.edit', [$category]) }}" class="btn btn-primary">Edit </a>
                        </div>
                        <td>
                        <form method="post" action={{ route('category.destroy', [$category]) }}>
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                        <td>
                    </td>
            @endforeach
        </table>


    </div>
@endsection
