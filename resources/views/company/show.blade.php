@extends('base')

@section('body')
    <td> Company: {{$company->name}}</td>
    <table>
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Website</th>
        <th>Author</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Actions</th>

        </thead>
        <tbody>
            <tr>
                <td>{{$company->id}}</td>
                <td>{{$company->name}}</td>
                <td>{{$company->website}}</td>
                <td>{{$company->user->name}}</td>
                <td>{{$company->created_at}}</td>
                <td>{{$company->updated_at}}</td>
                <td>
                    <a href="{{route('company.edit', ['company'=>$company->id])}}"
                       class="button button-outline">Edit</a>
                    @include('company/delete_form')
                </td>
            </tr>
        </tbody>
    </table>
@endsection
