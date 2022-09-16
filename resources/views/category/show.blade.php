@extends('base')

@section('body')
    <h2>Category {{$category->name}}</h2>
    <table>
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>CreatedAt</th>
        <th>UpdatedAt</th>
        <th>Actions</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    <a href="{{route('category.edit', ['category'=>$category->id])}}">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>

@endsection
