@extends('base')

@section('body')
    <table>
        <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Location</th>
        <th>Image URL</th>
        <th>Type</th>
        <th>Category</th>
        <th>Company</th>
        <th>Author</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Actions</th>
        </thead>
        <tbody>
        <tr>
            <td>{{$vacancy->id}}</td>
            <td>{{$vacancy->title}}</td>
            <td>{{$vacancy->content}}</td>
            <td>{{$vacancy->location}}</td>
            <td>{{$vacancy->imageUrl}}</td>
            <td>{{$vacancy->type}}</td>
            <td>{{$vacancy->category->name}}</td>
            <td>{{$vacancy->company->name}}</td>
            <td>{{$vacancy->user->name}}</td>
            <td>{{$vacancy->created_at}}</td>
            <td>{{$vacancy->updated_at}}</td>
            <td>
                <a href="{{route('vacancy.edit', ['vacancy'=>$vacancy->id])}}" class="button button-outline">Edit</a>
                @include('vacancy/delete_form')
            </td>
        </tr>
        </tbody>
    </table>
@endsection
