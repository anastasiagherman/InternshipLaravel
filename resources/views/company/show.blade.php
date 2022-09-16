@extends('base')

@section('body')
    <table>
        <thead>
        <th>ID</th>
        <th>Title</th>
        <
        <th>Actions</th>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{route('category.show', ['category'=>$category->id])}}">Show</a>
                    <a href="{{route('category.edit', ['category'=>$category->id])}}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
