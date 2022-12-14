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
        <th>Actions</th>
        </thead>
        <tbody>
        @foreach($vacancies as $vacancy)
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
                <td>
                    <a href="{{route('vacancy.show', ['vacancy'=>$vacancy->id])}}" class="button button-outline">Show</a>
                    <a href="{{route('vacancy.edit', ['vacancy'=>$vacancy->id])}}" class="button button-outline">Edit</a>
                    @include('vacancy/delete_form')
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">{{$vacancies->links()}}</div>
    <a href="{{route('vacancy.create')}}" class="button">Create Vacancy</a>
@endsection
