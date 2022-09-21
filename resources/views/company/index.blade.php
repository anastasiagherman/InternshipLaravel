@extends('base')

@section('body')

    <h2>Welcome to companies</h2>

    <table>
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Website</th>
        <th>Author</th>
        <th>Actions</th>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <td>{{$company->id}}</td>
                <td>{{$company->name}}</td>
                <td>{{$company->website}}</td>
                <td>{{$company->user->name}}</td>
                <td>
                    <a href="{{route('company.edit', ['company' => $company->id])}}" class="button button-outline">Edit</a>
                    <a href="{{route('company.show', ['company' => $company->id])}}" class="button button-outline">Show</a>
                    @include('company/delete_form')
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
{{$companies->links()}}
    <a href="{{route('company.create')}}" class="button">Create Company</a>

    {{$companies->links()}}
@endsection
